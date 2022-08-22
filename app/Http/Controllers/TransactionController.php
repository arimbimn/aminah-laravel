<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        dd($request);
    }
}
