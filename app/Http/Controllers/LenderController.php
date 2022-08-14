<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Funding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LenderController extends Controller
{
    public function index()
    {
        $fundings = Funding::where('is_finished', '0')->limit(2)->latest()->get();
        foreach ($fundings as $funding) {
            $totalUnitTerjual = $funding->fundinglenders->count();
            $danaTerkumpul = $totalUnitTerjual * env('HARGA_UNIT', 100000);
            $dana_terkumpul = $danaTerkumpul;
            $funding->dana_terkumpul = $dana_terkumpul;
            $funding->dana_terkumpul_persen = ($dana_terkumpul != 0) ? $dana_terkumpul / $funding->accepted_fund * 100 : 0;
        }

        $data = array(
            'title' => "Aminah | Home",
            'active' => 'home',
            'mitra' => $fundings,
        );

        return view('pages.lender.home', $data);
    }
    public function mitra()
    {
        $fundings = Funding::where('is_finished', '0')->latest()->get();
        foreach ($fundings as $funding) {
            $totalUnitTerjual = $funding->fundinglenders->count();
            $danaTerkumpul = $totalUnitTerjual * env('HARGA_UNIT', 100000);
            $dana_terkumpul = $danaTerkumpul;
            $funding->dana_terkumpul = $dana_terkumpul;
            $funding->dana_terkumpul_persen = ($dana_terkumpul != 0) ? $dana_terkumpul / $funding->accepted_fund * 100 : 0;
        }

        $data = array(
            'title' => "Aminah | Mitra",
            'active' => 'mitra',
            'mitra' => $fundings,
        );

        return view('pages.lender.mitra', $data);
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
