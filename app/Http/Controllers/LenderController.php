<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function detail_mitra()
    {
        return view('pages/lender/mitra/detail', [
            "title" => "Aminah | Detail Mitra",
            'active' => 'mitra',
        ]);
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::with('lender')->find($id);
        // dd($user->lender);

        $data = array(
            'title' => "Aminah | Profile",
            'active' => 'profile',
            'user' => $user,
        );

        return view('pages/lender/profile_lender', $data);
    }
}
