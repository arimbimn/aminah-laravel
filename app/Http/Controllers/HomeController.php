<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages/landingpage/home', [
            "title" => "Aminah | Home",
            'active' => 'home',
        ]);
    }
    public function about()
    {
        return view('pages/landingpage/about', [
            "title" => "Aminah | Tentang Kami",
            'active' => 'tentang-kami',
        ]);
    }
    public function how_to_work()
    {
        return view('pages/landingpage/how_to_work', [
            "title" => "Aminah | Cara Kerja",
            'active' => 'cara-kerja',
        ]);
    }
}
