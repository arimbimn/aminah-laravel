<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        $data = array(
            'title' => 'Aminah | Data Keuangan Aminah',
            'active' => 'keuangan',
            'page' => 'Data Keuangan Aminah',
            'tableName' => 'Tabel Data Keuangan Aminah',
            'breadcrumbs' => isset($breadcrumbs) ? $breadcrumbs : null,
        );
        return view('pages.admin.keuangan.index', $data);
    }

    public function detail()
    {
        $data = array(
            'title' => "Aminah | Detail Keuangan Aminah",
            'active' => 'keuangan',
            'page' => 'Detail Keuangan Aminah',
            'tableName' => 'Detail Keuangan Aminah',
        );

        return view('pages.admin.keuangan.detail', $data);
    }
}
