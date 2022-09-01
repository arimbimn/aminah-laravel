<?php

namespace App\Http\Controllers;

use App\Models\Funding;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\FundingLender;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartList()
    {
        $userID = Auth::user()->id;

        $cart = \Cart::session($userID)->getContent();
        $data = array(
            'title' => 'Aminah | Keranjang',
            'active' => 'cart',
            'cartItems' => $cart,
        );
        return view('pages.lender.cart', $data);
    }

    public function addToCart(Request $request)
    {
        // dd($request);
        $userID = Auth::user()->id;
        $funding = Funding::find($request->id);
        if ($funding) {
            $booked = $funding->fundinglenders->sum('unit_amount');
            $acceptedFund = $funding->accepted_fund;
            $hargaUnit = env('HARGA_UNIT', 100000);
            $sisaUnit = ($acceptedFund / $hargaUnit) - $booked;

            $existCart = \Cart::session($userID)->get($request->id);
            if ($existCart) {
                if ($sisaUnit <= $existCart->quantity) {
                    session()->flash('error', 'Jumlah unit tidak cukup, gagal tambah keranjang !');
                    return redirect()->route('cart.list');
                }
            }

            if ($sisaUnit <= $request->quantity) {
                session()->flash('error', 'Jumlah unit tidak cukup, gagal tambah keranjang !');
                return redirect()->route('cart.list');
            }
        }

        \Cart::session($userID)->add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => asset('pendaftaran/' . $request->image),
            ),
            'associatedModel' => $funding,
        ]);
        session()->flash('success', 'Berhasil tambah ke keranjang !');
        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        $userID = Auth::user()->id;

        $funding = Funding::find($request->id);
        if ($funding) {
            $booked = $funding->fundinglenders->sum('unit_amount');
            $acceptedFund = $funding->accepted_fund;
            $hargaUnit = env('HARGA_UNIT', 100000);
            $sisaUnit = ($acceptedFund / $hargaUnit) - $booked;

            if ($sisaUnit >= $request->quantity) {
                \Cart::session($userID)->update(
                    $request->id,
                    [
                        'quantity' => [
                            'relative' => false,
                            'value' => $request->quantity
                        ],
                    ]
                );
                session()->flash('success', 'Berhasil update keranjang !');
                return redirect()->route('cart.list');
            } else {
                session()->flash('error', 'Jumlah unit tidak cukup, gagal update keranjang !');
                return redirect()->route('cart.list');
            }
        }

        session()->flash('error', 'Gagal update keranjang, coba lagi nanti !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        $userID = Auth::user()->id;

        \Cart::session($userID)->remove($request->id);
        session()->flash('success', 'Berhasil hapus unit dari keranjang !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        $userID = Auth::user()->id;

        \Cart::session($userID)->clear();

        session()->flash('success', 'Berhasil hapus keranjang !');

        return redirect()->route('cart.list');
    }

    public function invoice()
    {
        $userID = Auth::user()->id;
        $cart = \Cart::session($userID)->getContent();

        $data = array(
            'title' => 'Aminah | Detail Transaksi',
            'active' => 'cart',
            'page' => 'Detail Transaksi',
            'items' => $cart,
        );
        return view('pages.transaction.invoice', $data);
    }

    public function checkOut(Request $request)
    {
        $this->validate($request, [
            'metodePembayaran' => 'required',
        ]);

        $userID = Auth::user()->id;
        if (Auth::user()->checkProfile == null) {
            session()->flash('error', 'Harap lengkapi profil anda terlebih dahulu!');
            return redirect()->route('cart.list');
        }
        if (\Cart::session($userID)->getTotal() > (float)Auth::user()->sumAmount()) {
            session()->flash('error', 'Maaf, saldo tidak cukup!');
            return redirect()->route('cart.list');
        }

        $cartItems = \Cart::session($userID)->getContent();
        if ($cartItems->count() <= 0) {
            session()->flash('error', 'Maaf, tidak ada item di keranjang!');
            return redirect()->route('cart.list');
        }

        foreach ($cartItems as $cartItem) {
            $sub_total = floatval($cartItem->quantity) * floatval(env('HARGA_UNIT', 100000));
            $funding_id = $cartItem->id;
            $borrower_id = $cartItem->associatedModel->borrower_id;
            $borrower_user_id = isset($cartItem->associatedModel->borrower->user->id) ? $cartItem->associatedModel->borrower->user->id : null;

            $fundingLender = new FundingLender();
            $fundingLender->status = 'waiting';
            $fundingLender->funding_id = $funding_id;
            $fundingLender->lender_id = $userID;
            $fundingLender->lender_user_id = $userID;
            $fundingLender->amount = $sub_total;
            $fundingLender->unit_amount = $cartItem->quantity;
            $fundingLender->trx_hash = md5($userID . $cartItem->id . now());

            $transaction = new Transaction();
            $transaction->trx_hash = md5($userID . now());
            $transaction->transaction_type = '6';
            $transaction->status = 'success';
            $transaction->funding_id = $funding_id;
            $transaction->user_id = $userID;
            $transaction->borrower_user_id = isset($borrower_user_id) ? $borrower_user_id : null;
            $transaction->borrower_id = $borrower_id;
            $transaction->transaction_date = now();
            $transaction->transaction_datetime = now();
            $transaction->transaction_amount = $sub_total;
            $transaction->save();

            $transaction_id = $transaction->id;
            $fundingLender->transaction_id = $transaction_id;
            $fundingLender->save();

            $funding = Funding::find($funding_id);
            if ($funding) {
                $booked = $funding->fundinglenders->sum('unit_amount');
                $acceptedFund = $funding->accepted_fund;
                $hargaUnit = env('HARGA_UNIT', 100000);
                $sisaUnit = ($acceptedFund / $hargaUnit) - $booked;
                // kalo pendanaan tercapai
                if ($sisaUnit <= 0) {
                    $funding->funding_full_date = now();
                    $funding_period = isset($funding->funding_period) ? $funding->funding_period : 12;
                    $funding->due_date = now()->addMonths($funding_period);
                    $funding->status = '2';
                    $funding->save();
                    foreach ($funding->fundinglenders as $fl) {
                        $fl->status = 'on progress';
                        $fl->save();
                    }
                    // add return schema to transaction table
                    $tanggalJatuhTempo = Carbon::parse($funding->due_date);
                    $listJatuhTempo = [];
                    for ($i = 1; $i <= $funding->funding_period; $i++) {
                        array_push($listJatuhTempo, $tanggalJatuhTempo->toDateString());
                        $tanggalJatuhTempo = $tanggalJatuhTempo->subMonths(1);
                    }
                    $listJatuhTempo = array_reverse($listJatuhTempo);
                    foreach ($listJatuhTempo as $item) {
                        $billPerMonth = ($funding->accepted_fund * (1 + $funding->profit_sharing_estimate / 100)) / $funding->funding_period;
                        $roundUp = ceil($billPerMonth);
                        $roundUpFinal = round($roundUp, -2, PHP_ROUND_HALF_UP);
                        if ($roundUpFinal < $roundUp) {
                            $roundUpFinal += 100;
                        }
                        $transaction = new Transaction();
                        $transaction->trx_hash = md5(rand(1, 9999) . now());
                        $transaction->transaction_type = '7';
                        $transaction->status = 'waiting';
                        $transaction->funding_id = $funding->id;
                        $transaction->user_id = $funding->borrower->user->id;
                        $transaction->borrower_user_id = $funding->borrower->user->id;
                        $transaction->borrower_id = $funding->borrower->id;
                        $transaction->transaction_date = $item;
                        $transaction->transaction_datetime = $item;
                        $transaction->transaction_amount = $roundUpFinal;
                        $transaction->save();
                    }
                }
            }
        }

        \Cart::session($userID)->clear();
        session()->flash('success', 'Berhasil checkout !');
        return redirect()->to('lender/profile');
    }
}
