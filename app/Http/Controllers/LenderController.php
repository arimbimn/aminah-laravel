<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LenderController extends Controller
{
    public function index()
    {
        return view('pages/lender/home_lender', [
            "title" => "Aminah | Home",
            'active' => 'home',
        ]);
    }
    public function mitra()
    {
        return view('pages/lender/mitra', [
            "title" => "Aminah | Mitra",
            'active' => 'mitra',
        ]);
    }
    public function profile()
    {
        return view('pages/lender/profile_lender', [
            "title" => "Aminah | Profile",
            'active' => 'profile',
        ]);
    }
}
