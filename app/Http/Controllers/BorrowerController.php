<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    public function index()
    {
        return view('pages/borrower/profile_borrower', [
            "title" => "Aminah | Home",
        ]);
    }

    public function pengajuan_pendanaan()
    {
        return view('pages/borrower/pengajuan_pendanaan', [
            "title" => "Aminah | Form Pengajuan Pendanaan",
        ]);
    }
}
