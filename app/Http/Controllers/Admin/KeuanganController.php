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

        $transactions = Transaction::latest()->get();

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

    public function approve($trx_id)
    {
        $transaction = Transaction::where('trx_hash', $trx_id)->first();

        if (!$transaction) {
            return redirect()->to('admin/transaksi')->withErrors('Data tidak ditemukan');
        }

        $transaction->status = 'success';
        $saving = $transaction->save();

        if ($saving) {
            return redirect()
                ->to('/admin/transaksi')
                ->with([
                    'success' => 'Berhasil terima transaksi'
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

    public function reject($trx_id)
    {
        $transaction = Transaction::where('trx_hash', $trx_id)->first();

        if (!$transaction) {
            return redirect()->to('admin/transaksi')->withErrors('Data tidak ditemukan');
        }

        $transaction->status = 'failed';
        $saving = $transaction->save();

        if ($saving) {
            return redirect()
                ->to('/admin/transaksi')
                ->with([
                    'success' => 'Berhasil menolak transaksi'
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
