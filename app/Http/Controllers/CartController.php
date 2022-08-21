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
        $userID = Auth::user()->id;

        $funding = Funding::find($request->id);

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
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        $userID = Auth::user()->id;

        $funding = Funding::find($request->id);
        if ($funding) {
            $booked = $funding->fundinglenders->count();
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
                session()->flash('success', 'Keranjang berhasil di update !');

                return redirect()->route('cart.list');
            } else {
                session()->flash('error', 'Jumlah unit tidak cukup !');

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
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        $userID = Auth::user()->id;

        \Cart::session($userID)->clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }

    public function checkOut()
    {
        if (Auth::user()->checkProfile == null) {
            return redirect()->route('cart.list');
        }

        $userID = Auth::user()->id;
        $cartItems = \Cart::session($userID)->getContent();
        foreach ($cartItems as $cartItem) {
            for ($i = 1; $i <= $cartItem->quantity; $i++) {
                $fundingLender = new FundingLender();
                $fundingLender->status = 'waiting';
                $fundingLender->funding_id = $cartItem->id;
                $fundingLender->lender_id = $userID;
                $fundingLender->save();
            }
        }
        \Cart::session($userID)->clear();
        session()->flash('success', 'Checkout success !');

        return redirect()->route('cart.list');
    }
}
