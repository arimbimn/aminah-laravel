<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;

class KeuanganController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            [
                'title' => 'Dashboard',
                'href' => route('admin.dashboard'),
                'active' => 0,
            ],
            [
                'title' => 'Data Keuangan Aminah',
                'href' => null,
                'active' => 1,
            ],
        ];

        $transactions = Transaction::whereIn('transaction_type', ['1', '6', '7'])->orderBy('transaction_datetime', 'desc')->get();
        $transactions = $transactions->filter(function ($item) {
            if (!($item->transaction_type == '7' && $item->status == 'waiting')) {
                return $item;
            }
        })->values();


        $data = array(
            'title' => 'Aminah | Data Keuangan Aminah',
            'active' => 'keuangan',
            'page' => 'Data Keuangan Aminah',
            'tableName' => 'Tabel Data Keuangan Aminah',
            'breadcrumbs' => isset($breadcrumbs) ? $breadcrumbs : null,
            'transactions' => $transactions,
        );
        return view('pages.admin.keuangan.index', $data);
    }

    public function detail($trx_id)
    {
        $transaction = Transaction::where('trx_hash', $trx_id)->first();

        if (!$transaction) {
            return redirect()->to('admin/transaksi')->withErrors('Data tidak ditemukan');
        }

        $data = array(
            'title' => "Aminah | Detail Keuangan Aminah",
            'active' => 'keuangan',
            'page' => 'Detail Keuangan Aminah',
            'tableName' => 'Detail Keuangan Aminah',
            'transaction' => $transaction,
        );

        return view('pages.admin.keuangan.detail', $data);
    }

    public function approve(Request $request)
    {
        $trx_id = $request->input('id');
        $transaction = Transaction::where('trx_hash', $trx_id)->first();

        if (!$transaction) {
            return redirect()->to('admin/transaksi')->withErrors('Data tidak ditemukan');
        }

        $transaction->status = 'success';
        $saving = $transaction->save();

        // bakal bug kalo terus2an diterima
        if ($transaction->transaction_type == '7') {
            $danaBagiHasil = $transaction->transaction_amount;
            $funding = $transaction->funding;
            $totalUnit = $funding->accepted_fund / env('HARGA_UNIT', 100000);
            $valuePerUnit = $danaBagiHasil / $totalUnit;
            $fundingLenders = $funding->fundingLenders;
            foreach ($fundingLenders as $item) {
                $new_transaction = new Transaction();
                $new_transaction->transaction_type = '2';
                $new_transaction->trx_hash = md5(rand(1, 9999) . now());
                $new_transaction->status = 'success';
                $new_transaction->user_id = $item->lender_user_id;
                $new_transaction->transaction_date = now();
                $new_transaction->transaction_datetime = now();
                $new_transaction->transaction_amount = $item->unit_amount * $valuePerUnit;
                $new_transaction->transaction_id_ref = $transaction->id;
                $new_transaction->save();
            }
        }

        if ($saving) {
            return response()->json([
                'status' => true,
                'message' => 'success'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'error'
            ], 400);
        }
    }

    public function reject(Request $request)
    {
        $trx_id = $request->input('id');
        $transaction = Transaction::where('trx_hash', $trx_id)->first();

        if (!$transaction) {
            return redirect()->to('admin/transaksi')->withErrors('Data tidak ditemukan');
        }

        $transaction->status = 'failed';
        $saving = $transaction->save();

        if ($saving) {
            return response()->json([
                'status' => true,
                'message' => 'success'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'error'
            ], 400);
        }
    }
}
