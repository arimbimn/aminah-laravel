<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Funding;
use App\Models\Borrower;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LenderController extends Controller
{
    public function index()
    {
        $fundings = Funding::where('is_finished', '0')->active()->limit(2)->latest()->get();
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
        $fundings = Funding::where('is_finished', '0')->active()->latest()->get();
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
    public function detailMitra(Funding $funding)
    {
        // dd($funding);
        // dd($borrower->fundings[0]->accepted_fund);
        if ($funding) {
            $totalUnitTerjual = $funding->fundinglenders->count();
            $danaTerkumpul = $totalUnitTerjual * env('HARGA_UNIT', 100000);
            $dana_terkumpul = $danaTerkumpul;
            $funding->dana_terkumpul = $dana_terkumpul;
            $funding->dana_terkumpul_persen = ($dana_terkumpul != 0) ? $dana_terkumpul / $funding->accepted_fund * 100 : 0;
        }
        $data = array(
            "title" => "Aminah | Detail Mitra",
            'active' => 'mitra',
            'funding' => $funding,
        );

        return view('pages.lender.mitra.detail', $data);
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

        return view('pages.lender.profile_lender', $data);
    }

    public function input_profile()
    {
        $data = array(
            'title' => "Aminah | Form Lengkapi Profile",
            'active' => 'profile',
        );

        return view('pages.lender.input_profile', $data);
    }
}
