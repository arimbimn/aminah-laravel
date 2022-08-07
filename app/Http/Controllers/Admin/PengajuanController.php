<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrower;
use App\Models\User;

class PengajuanController extends Controller
{
    public function index()
    {
        $records = Borrower::pending()->paginate(50);

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
        $id = $request->input('id');
        if (!$id) {
            return response()->json([
                'status' => false,
                'message' => 'Provide an id'
            ], 400);
        }

        $borrower = Borrower::find($id);

        if ($borrower) {
            $borrower->status = 'Accepted';
            $borrower->save();

            $user = new User();
            $user->name = $borrower->name;
            $user->email = $borrower->email;
            $user->password = bcrypt('123456');
            $user->role = 'borrower';
            $user->save();

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
