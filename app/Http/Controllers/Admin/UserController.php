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
}
