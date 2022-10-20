<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::admin()->paginate(50);

        $breadcrumbs = [
            [
                'title' => 'Dashboard',
                'href' => route('admin.dashboard'),
                'active' => 0,
            ],
            [
                'title' => 'Data Admin',
                'href' => null,
                'active' => 1,
            ],
        ];

        $buttons = [
            [
                'type' => 'success',
                'title' => 'Tambah',
                'icon' => 'fa-plus',
                'href' => url('admin/user/tambah'),
                'class' => 'col-12',
            ],
        ];

        $data = array(
            'title' => 'Aminah | Data Admin Aminah',
            'active' => 'user',
            'page' => 'Data Admin',
            'tableName' => 'Tabel Data Admin',
            'breadcrumbs' => isset($breadcrumbs) ? $breadcrumbs : null,
            'buttons' => isset($buttons) ? $buttons : null,
            'users' => isset($users) ? $users : array(),
        );
        return view('pages.admin.user.index', $data);
    }

    public function createAdmin()
    {
        $roles = array(
            'admin' => 'Admin',
        );

        $data = array(
            'title' => 'Aminah | Tambah Admin Aminah',
            'active' => 'user',
            'page' => 'Tambah Data Admin',
            'roles' => $roles,
        );
        return view('pages.admin.user.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'                  => 'required',
            'email'                 => 'required',
            'role'                  => 'required',
            'password'              => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $saving = $user->save();

        if ($saving) {
            return redirect()
                ->route('admin.user')
                ->with([
                    'success' => 'Berhasil menambahkan admin'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Maaf gagal, coba lagi nanti'
                ]);
        }
    }
}
