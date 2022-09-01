<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login.index');
    }
    public function login_admin()
    {
        return view('pages.login.login_admin');
    }
    public function forgot_password()
    {
        return view('pages.login.forgot_password');
    }
    public function recovery_password()
    {
        return view('pages.login.recovery_password');
    }
}
