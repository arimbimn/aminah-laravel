<?php

namespace App\Http\Controllers;

use App\Models\Funding;
use App\Models\FundingLender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartList()
    {
        $userID = Auth::user()->id;
        $data = array(
            'title' => 'Aminah | Keranjang',
            'active' => 'cart',
            'cartItems' => \Cart::session($userID)->getContent(),
        );
        return view('pages.lender.cart', $data);
    }

    public function addToCart(Request $request)
    {
        // dd($request);
        $userID = Auth::user()->id;
        $funding = Funding::find($request->id);

        $existCart = \Cart::session($userID)->get($request->id);
        if ($existCart) {
            $booked = $funding->fundinglenders->sum('unit_amount');
            $acceptedFund = $funding->accepted_fund;
            $hargaUnit = env('HARGA_UNIT', 100000);
            $sisaUnit = ($acceptedFund / $hargaUnit) - $booked;

            if ($sisaUnit <= $existCart->quantity) {
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

    public function checkOut()
    {
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
        foreach ($cartItems as $cartItem) {
            $fundingLender = new FundingLender();
            $fundingLender->status = 'waiting';
            $fundingLender->funding_id = $cartItem->id;
            $fundingLender->lender_id = $userID;
            $fundingLender->amount = $cartItem->quantity . env('HARGA_UNIT', 100000);
            $fundingLender->unit_amount = $cartItem->quantity;
            $fundingLender->trx_hash = md5($userID . $cartItem->id . now());
            $fundingLender->save();
        }
        \Cart::session($userID)->clear();
        session()->flash('success', 'Berhasil checkout !');

        return redirect()->route('cart.list');
    }
}
