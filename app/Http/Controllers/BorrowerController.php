<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowerController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::with('borrower')->find($id);
        // dd($user->borrower);

        $data = array(
            'title' => "Aminah | Profile",
            'active' => 'profile',
            'user' => $user,
        );

        return view('pages/borrower/profile_borrower', $data);
    }

    public function pengajuan_pendanaan()
    {

        $data = array(
            'title' => "Aminah | Form Pengajuan Pendanaan",
        );
        return view('pages/borrower/pengajuan_pendanaan', $data);
    }
}
