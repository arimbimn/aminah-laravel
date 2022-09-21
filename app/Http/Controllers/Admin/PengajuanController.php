<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrower;
use App\Models\Funding;
use App\Models\User;

class PengajuanController extends Controller
{
    public function index()
    {
        $records = Borrower::pending()->latest()->paginate(10);

        $breadcrumbs = [
            [
                'title' => 'Dashboard',
                'href' => route('admin.dashboard'),
                'active' => 0,
            ],
            [
                'title' => 'Data Pengajuan',
                'href' => null,
                'active' => 1,
            ],
        ];

        // $buttons = [
        //     [
        //         'type' => 'success',
        //         'title' => 'Tambah',
        //         'icon' => 'fa-plus',
        //         'href' => url('admin/user/tambah'),
        //         'class' => 'col-12',
        //     ],
        // ];

        $data = array(
            'title' => 'Aminah | Data Pengajuan Aminah',
            'active' => 'pengajuan',
            'page' => 'Data Pengajuan',
            'tableName' => 'Tabel Data Pengajuan',
            'breadcrumbs' => isset($breadcrumbs) ? $breadcrumbs : null,
            'buttons' => isset($buttons) ? $buttons : null,
            'records' => isset($records) ? $records : array(),
        );
        return view('pages.admin.pengajuan.index', $data);
    }

    public function detail(Borrower $borrower)
    {

        $breadcrumbs = [
            [
                'title' => 'Dashboard',
                'href' => route('admin.dashboard'),
                'active' => 0,
            ],
            [
                'title' => 'Data Pengajuan',
                'href' => route('admin.borrower'),
                'active' => 0,
            ],
            [
                'title' => 'Detail Data Pengajuan',
                'href' => null,
                'active' => 1,
            ],
        ];

        $buttons = [
            [
                'type' => 'secondary',
                'title' => 'Kembali',
                'icon' => 'fa-undo',
                'href' => route('admin.borrower'),
                'class' => 'col-12',
                'width' => 'full',
            ],
        ];

        $data = array(
            'title' => 'Aminah | Detail Data Pengajuan',
            'active' => 'pengajuan',
            'page' => isset($borrower->business_name) ? $borrower->business_name : 'Usaha',
            'breadcrumbs' => isset($breadcrumbs) ? $breadcrumbs : null,
            'buttons' => isset($buttons) ? $buttons : null,
            'borrower' => $borrower,
        );
        return view('pages.admin.pengajuan.detail', $data);
    }

    public function approve(Request $request)
    {
        $acceptedFunding = $request->input('acceptedFunding');
        $acceptedFunding = preg_replace("/[^0-9]/", "", $acceptedFunding);
        $id = $request->input('id');
        if (!$id) {
            return response()->json([
                'status' => false,
                'message' => 'Provide an id'
            ], 400);
        }

        if ($acceptedFunding % 100000 != 0) {
            return response()->json([
                'status' => false,
                'message' => 'False accepted funding format'
            ], 400);
        }

        $borrower = Borrower::find($id);

        if ($borrower) {
            if ($acceptedFunding > $borrower->borrower_first_submission) {
                return response()->json([
                    'status' => false,
                    'message' => 'Accepted funding more than first submission'
                ], 400);
            }

            $borrower->status = 'Accepted';
            $borrower->save();

            $funding = new Funding();
            $funding->borrower_id = $borrower->id;
            $funding->accepted_fund = $acceptedFunding;
            $funding->funding_start_date = now();
            $funding->due_date = now()->addDays(7);
            $funding->funding_period = $borrower->duration;
            $funding->status = 'Active';
            $funding->save();

            return response()->json([
                'status' => true,
                'message' => 'Successfully approved',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data not found',
            ], 404);
        }
    }

    public function reject(Request $request)
    {
        $id = $request->input('id');
        if (!$id) {
            return response()->json([
                'status' => false,
                'message' => 'Provide an id'
            ], 400);
        }

        $borrower = Borrower::find($id);

        if ($borrower) {
            $borrower->status = 'Rejected';
            $borrower->save();

            return response()->json([
                'status' => true,
                'message' => 'Successfully approved',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data not found',
            ], 404);
        }
    }
}
