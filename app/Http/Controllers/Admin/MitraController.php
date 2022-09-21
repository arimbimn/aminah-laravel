<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrower;

class MitraController extends Controller
{
    public function index()
    {
        $records = Borrower::accepted()->paginate(10);

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
            'title' => 'Aminah | Data Mitra Aminah',
            'active' => 'mitra',
            'page' => 'Data Mitra',
            'tableName' => 'Tabel Data Mitra',
            'breadcrumbs' => isset($breadcrumbs) ? $breadcrumbs : null,
            'buttons' => isset($buttons) ? $buttons : null,
            'records' => isset($records) ? $records : array(),
        );
        return view('pages.admin.mitra.index', $data);
    }

    public function detail(Borrower $borrower)
    {
        // dd($borrower);

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
                'href' => route('admin.partner'),
                'class' => 'col-12',
                'width' => 'full',
            ],
        ];

        $data = array(
            'title' => 'Aminah | Detail Data Mitra',
            'active' => 'mitra',
            'page' => isset($borrower->business_name) ? $borrower->business_name : 'Usaha',
            'breadcrumbs' => isset($breadcrumbs) ? $breadcrumbs : null,
            'buttons' => isset($buttons) ? $buttons : null,
            'borrower' => $borrower,
        );
        return view('pages.admin.mitra.detail', $data);
    }

    public function destroy(Request $request)
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
            $fundings = $borrower->fundings;
            if ($fundings) {
                foreach ($fundings as $funding) {
                    $funding->status = 'Inactive';
                    $funding->save();
                }
            }

            $borrower->status = 'Nonaktif';
            $borrower->is_active = '0';
            $borrower->save();

            return response()->json([
                'status' => true,
                'message' => 'Successfully updated',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data not found',
            ], 404);
        }
    }
}
