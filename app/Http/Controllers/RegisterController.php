<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages/register/register_lender');
    }
    public function register_borrower()
    {
        return view('pages/register/register_borrower');
    }
}
