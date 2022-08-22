<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Aminah | Detail Transaksi',
            'active' => 'profile',
            'page' => 'Detail Transaksi',
        );
        return view('pages.transaction.invoice', $data);
    }

    public function recharge()
    {
        $data = array(
            'title' => 'Aminah | Isi Saldo',
            'active' => 'profile',
            'page' => 'Isi Saldo',
        );
        return view('pages.lender.dompet.recharge', $data);
    }

    public function storeRecharge(Request $request)
    {
        $user_id = Auth::user()->id;
        $nominal = $request->input('product');

        $transaction = new Transaction();
        $transaction->trx_hash = md5($user_id . now());
        $transaction->transaction_type = '1';
        $transaction->status = 'waiting';
        $transaction->user_id = $user_id;
        $transaction->transaction_date = now();
        $transaction->transaction_datetime = now();
        $transaction->transaction_amount = $nominal;
        $saving = $transaction->save();

        if ($saving) {
            return redirect()
                ->to('/lender/profile')
                ->with([
                    'success' => 'Segera lakukan pembayaran'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Maaf gagal, coba lagi nanti'
                ]);
        }
    }
}
