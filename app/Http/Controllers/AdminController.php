<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages/admin/dashboard_admin', [
            "title" => "Aminah | Dashboard",
        ]);
    }
    public function data_pengajuan_masuk()
    {
        return view('pages/admin/data_pengajuan_masuk', [
            "title" => "Aminah | Data Pengajuan Masuk",
        ]);
    }
    public function detail_pengajuan_masuk()
    {
        return view('pages/admin/detail_data_pengajuan', [
            "title" => "Aminah | Detail Pengajuan Masuk",
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
    public function data_mitra()
    {
        return view('pages/admin/data_mitra', [
            "title" => "Aminah | Data Mitra Aminah",
        ]);
    }
    public function detail_data_mitra()
    {
        return view('pages/admin/detail_data_mitra', [
            "title" => "Aminah | Detail Mitra Aminah",
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
    public function data_admin()
    {
        return view('pages/admin/data_admin', [
            "title" => "Aminah | Data Admin Aminah",
        ]);
    }
}
