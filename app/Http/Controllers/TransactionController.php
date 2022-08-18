<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {

        $data = array(
            'title' => 'Aminah | Form Invoice Transaksi',
            'active' => 'profile',
            'page' => 'Form Invoice Transaksi',
        );
        return view('pages.transaction.invoice', $data);
    }
}
