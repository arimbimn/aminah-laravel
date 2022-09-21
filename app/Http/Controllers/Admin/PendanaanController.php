<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Funding;
use Illuminate\Http\Request;

class PendanaanController extends Controller
{
    public function index()
    {
        $records = Funding::paginate(10);

        foreach ($records as $funding) {
            $totalUnitTerjual = $funding->fundinglenders->sum('unit_amount');
            $danaTerkumpul = $totalUnitTerjual * env('HARGA_UNIT', 100000);
            $dana_terkumpul = $danaTerkumpul;
            $funding->dana_terkumpul = $dana_terkumpul;
            $funding->dana_terkumpul_persen = ($dana_terkumpul != 0) ? $dana_terkumpul / $funding->accepted_fund * 100 : 0;
        }

        $breadcrumbs = [
            [
                'title' => 'Dashboard',
                'href' => route('admin.dashboard'),
                'active' => 0,
            ],
            [
                'title' => 'Data Pendanaan',
                'href' => null,
                'active' => 1,
            ],
        ];

        $data = array(
            'title' => "Aminah | Rincian Pendanaan Aminah",
            'active' => 'pendanaan',
            'page' => 'Rincian Pendanaan Aminah',
            'tableName' => 'Tabel Data Pendanaan',
            'breadcrumbs' => isset($breadcrumbs) ? $breadcrumbs : null,
            'records' => isset($records) ? $records : array(),
        );

        return view('pages.admin.pendanaan.index', $data);
    }

    public function detail($id)
    {
        $funding = Funding::find($id);

        $data = array(
            'title' => "Aminah | Detail Rincian Pendanaan Aminah",
            'active' => 'pendanaan',
            'page' => 'Detail Rincian Pendanaan Aminah',
            'tableName' => 'Tabel Detail Pendanaan',
            'records' => isset($records) ? $records : array(),
            'funding' => $funding,
        );

        return view('pages.admin.pendanaan.detail', $data);
    }
}
