<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lender;
use App\Models\Funding;
use App\Models\Borrower;
use Illuminate\Http\Request;
use App\Models\FundingLender;
use App\Models\LenderStatusType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class LenderController extends Controller
{
    public function index()
    {
        $fundings = Funding::where('is_finished', '0')->active()->limit(2)->latest()->get();
        foreach ($fundings as $funding) {
            $totalUnitTerjual = $funding->fundinglenders->sum('unit_amount');
            $danaTerkumpul = $totalUnitTerjual * env('HARGA_UNIT', 100000);
            $dana_terkumpul = $danaTerkumpul;
            $funding->dana_terkumpul = $dana_terkumpul;
            $funding->dana_terkumpul_persen = ($dana_terkumpul != 0) ? $dana_terkumpul / $funding->accepted_fund * 100 : 0;
        }

        $data = array(
            'title' => "Aminah | Home",
            'active' => 'home',
            'mitra' => $fundings,
        );

        return view('pages.lender.home', $data);
    }
    public function mitra(Request $request)
    {
        $fundings = Funding::where('is_finished', '0')->active()->latest()->paginate(9);
        foreach ($fundings as $funding) {
            $totalUnitTerjual = $funding->fundinglenders->sum('unit_amount');
            $dana_terkumpul = $totalUnitTerjual * env('HARGA_UNIT', 100000);
            $funding->dana_terkumpul = $dana_terkumpul;
            $funding->dana_terkumpul_persen = ($dana_terkumpul != 0) ? $dana_terkumpul / $funding->accepted_fund * 100 : 0;
        }
        $borrowers = '';
        if ($request->ajax()) {
            foreach ($fundings as $funding) {
                $borrowers .= View::make("components.card.borrower")->with('mitra', $funding)->render();
            }
            return $borrowers;
        }

        $data = array(
            'title' => "Aminah | Mitra",
            'active' => 'mitra',
            'mitra' => $fundings,
        );

        return view('pages.lender.mitra', $data);
    }
    public function detailMitra(Funding $funding)
    {
        // dd($funding);
        // dd($borrower->fundings[0]->accepted_fund);
        if ($funding) {
            $totalUnitTerjual = $funding->fundinglenders->sum('unit_amount');
            $dana_terkumpul = $totalUnitTerjual * env('HARGA_UNIT', 100000);
            $funding->dana_terkumpul = $dana_terkumpul;
            $funding->dana_terkumpul_persen = ($dana_terkumpul != 0) ? $dana_terkumpul / $funding->accepted_fund * 100 : 0;
            $funding->sisa_unit = ($funding->accepted_fund - $dana_terkumpul) / env('HARGA_UNIT', 100000);
        }

        $data = array(
            "title" => "Aminah | Detail Mitra",
            'active' => 'mitra',
            'funding' => $funding,
        );

        return view('pages.lender.mitra.detail', $data);
    }

    public function profile()
    {
        $userID = Auth::user()->id;
        $user = User::with('lender')->find($userID);
        $userFundings = FundingLender::where('lender_id', $userID)->latest()->get();

        $data = array(
            'title' => "Aminah | Profile",
            'active' => 'profile',
            'user' => $user,
            'userFundigs' => $userFundings,
        );

        return view('pages.lender.profile.index', $data);
    }

    public function editProfile()
    {
        $data = array(
            'title' => "Aminah | Form Lengkapi Profile",
            'active' => 'profile',
        );

        return view('pages.lender.profile.edit', $data);
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'nama'                  => 'required',
            'jenisKelamin'          => 'required',
            'tempatLahir'           => 'required',
            'tanggalLahir'          => 'required',
            'noHp'                  => 'required',
            'nik'                   => 'required',
            'alamat'                => 'required',
            'pemilikRekeningName'   => 'required',
            'nomorRekening'         => 'required',
            'bankName'              => 'required',
            'file-diri'             => 'required|file|mimes:jpg,jpeg,png,pdf',
            'file-ktp'              => 'required|file|mimes:jpg,jpeg,png,pdf',
            'approvedCheck'         => 'required',
        ]);

        $status = LenderStatusType::where('name', 'Verified')->first();

        $current = date('Ymdhis');
        $rand = rand(1, 100);
        $fileName = $current . $rand;

        $fileDiri = $request->file('file-diri');
        $fileKTP = $request->file('file-ktp');

        $fileNameDiri = $fileName . '_diri.' . $fileDiri->getClientOriginalExtension();
        $fileNameKTP = $fileName . '_ktp.' . $fileKTP->getClientOriginalExtension();
        $fileDiri->move('profile', $fileNameDiri);
        $fileKTP->move('profile', $fileNameKTP);

        $lender = new lender();
        $lender->name = $request->input('nama');
        $lender->email = Auth::user()->email;
        $lender->jenis_kelamin = $request->input('jenisKelamin');
        $lender->tempat_lahir = $request->input('tempatLahir');
        $lender->tanggal_lahir = $request->input('tanggalLahir');
        $lender->status = isset($status) ? $status->name : 'Verified';
        $lender->hp_number = $request->input('noHp');
        $lender->nik = $request->input('nik');
        $lender->address = $request->input('alamat');
        $lender->account_name = $request->input('pemilikRekeningName');
        $lender->account_number = $request->input('nomorRekening');
        $lender->bank_name = $request->input('bankName');
        $lender->lender_image = isset($fileNameDiri) ? $fileNameDiri : null;
        $lender->ktp_image = isset($fileNameKTP) ? $fileNameKTP : null;
        $saving = $lender->save();

        if ($saving) {
            return redirect()
                ->to('/lender/profile')
                ->with([
                    'success' => 'Berhasil mengubah profil'
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
