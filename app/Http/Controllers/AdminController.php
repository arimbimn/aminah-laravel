<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages/admin/dashboard', [
            "title" => "Aminah | Dashboard",
        ]);
    }

    public function rincian_pendanaan()
    {
        return view('pages/admin/rincian_pendanaan', [
            "title" => "Aminah | Rincian Pendanaan Aminah",
        ]);
    }
    public function detail_rincian_pendanaan()
    {
        return view('pages/admin/detail_rincian_pendanaan', [
            "title" => "Aminah | Detail Rincian Pendanaan",
        ]);
    }

    public function data_keuangan()
    {
        return view('pages/admin/data_keuangan', [
            "title" => "Aminah | Data Keuangan Aminah",
        ]);
    }
    public function detail_keuangan()
    {
        return view('pages/admin/detail_data_keuangan', [
            "title" => "Aminah | Detail Keuangan Aminah",
        ]);
    }
}
