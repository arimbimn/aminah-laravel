<?php

namespace App\Http\Controllers;

use App\Models\Funding;
use App\Models\FundingLender;
use App\Models\Transaction;
use Illuminate\Http\Request;
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
        }

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

        \Cart::session($userID)->add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
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

            // dd($sisaUnit);
            // dd($request->quantity);
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
            $fundingLender = new FundingLender();
            $fundingLender->status = 'waiting';
            $fundingLender->funding_id = $cartItem->id;
            $fundingLender->lender_id = $userID;
            $fundingLender->amount = floatval($cartItem->quantity) * floatval(env('HARGA_UNIT', 100000));
            $fundingLender->unit_amount = $cartItem->quantity;
            $fundingLender->trx_hash = md5($userID . $cartItem->id . now());
            $fundingLender->save();
        }
        $transaction = new Transaction();
        $transaction->trx_hash = md5($userID . now());
        $transaction->transaction_type = '6';
        $transaction->status = 'success';
        $transaction->user_id = $userID;
        $transaction->transaction_date = now();
        $transaction->transaction_datetime = now();
        $transaction->transaction_amount = \Cart::session($userID)->getTotal();
        $transaction->save();

        \Cart::session($userID)->clear();
        session()->flash('success', 'Berhasil checkout !');
        return redirect()->to('lender/profile');
    }
}
