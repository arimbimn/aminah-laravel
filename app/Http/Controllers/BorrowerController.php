<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    public function index()
    {
        return view('pages/borrower/profile_borrower', [
            "title" => "Aminah | Home",
        ]);
    }
}
