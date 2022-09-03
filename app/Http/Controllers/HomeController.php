<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funding;

class HomeController extends Controller
{
    public function index()
    {
        $fundings = Funding::where('is_finished', '0')->active()->inRandomOrder()->limit(2)->get();
        foreach ($fundings as $funding) {
            $totalUnitTerjual = $funding->fundinglenders->sum('unit_amount');
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

        return view('pages/landingpage/home', $data);
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
