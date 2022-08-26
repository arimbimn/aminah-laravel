<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Borrower;
use App\Models\BorrowerStatusType;
use App\Models\BusinessType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowerController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::with('latestBorrower')->find($id);
        $pengajuan = Borrower::where('email', Auth::user()->email)->latest()->first();

        $data = array(
            'title' => "Aminah | Profile",
            'active' => 'profile',
            'user' => $user,
            'pengajuan' => isset($pengajuan) ? $pengajuan : null,
        );

        return view('pages.borrower.profile_borrower', $data);
    }

    public function pengajuan_pendanaan()
    {
        $jenis = BusinessType::all();

        $data = array(
            'title' => "Aminah | Form Pengajuan Pendanaan",
            'jenis' => $jenis,
        );
        return view('pages.borrower.pengajuan_pendanaan', $data);
    }

    public function storeBorrower(Request $request)
    {
        $this->validate($request, [
            'pemilikName'           => 'required',
            'noHp'                  => 'required',
            'nik'                   => 'required',
            'alamat'                => 'required',
            'umkmName'              => 'required',
            'jenisUmkm'             => 'required',
            'umkmAddress'           => 'required',
            'income'                => 'required',
            'pemilikRekeningName'   => 'required',
            'nomorRekening'         => 'required',
            'bankName'              => 'required',
            'amount'                => 'required',
            'duration'              => 'required',
            'purpose'               => 'required',
            'estimate'              => 'required',
            'file-ktp'              => 'required|file|mimes:jpg,jpeg,png,pdf',
            'file-siu'              => 'required|file|mimes:jpg,jpeg,png,pdf',
            'file-foto-umkm'        => 'required|file|mimes:jpg,jpeg,png,pdf',
            'approvedCheck'         => 'required',
        ]);

        $status = BorrowerStatusType::where('name', 'Pending')->first();

        $current = date('Ymdhis');
        $rand = rand(1, 100);
        $fileName = $current . $rand;

        $fileKTP = $request->file('file-ktp');
        $fileSIU = $request->file('file-siu');
        $fileFoto = $request->file('file-foto-umkm');

        $fileNameKTP = $fileName . '_ktp.' . $fileKTP->getClientOriginalExtension();
        $fileNameSIU = $fileName . '_siu.' . $fileSIU->getClientOriginalExtension();
        $fileNameFoto = $fileName . '_foto.' . $fileFoto->getClientOriginalExtension();
        $fileKTP->move('pendaftaran', $fileNameKTP);
        $fileSIU->move('pendaftaran', $fileNameSIU);
        $fileFoto->move('pendaftaran', $fileNameFoto);

        $borrower = new Borrower();
        $borrower->name = $request->input('pemilikName');
        $borrower->email = isset(Auth::user()->email) ? Auth::user()->email : null;
        $borrower->phone_number = $request->input('noHp');
        $borrower->nik = $request->input('nik');
        $borrower->address = $request->input('alamat');
        $borrower->status = isset($status) ? $status->name : 'Pending';
        $borrower->business_name = $request->input('umkmName');
        $borrower->business_type = $request->input('jenisUmkm');
        $borrower->business_address = $request->input('umkmAddress');
        $borrower->borrower_monthly_income = $request->input('income');
        $borrower->account_name = $request->input('pemilikRekeningName');
        $borrower->account_number = $request->input('nomorRekening');
        $borrower->bank_name = $request->input('bankName');
        $borrower->borrower_first_submission = $request->input('amount');
        $borrower->duration = $request->input('duration');
        $borrower->purpose = $request->input('purpose');
        $borrower->profit_sharing_estimate = $request->input('estimate');
        $borrower->ktp_image = isset($fileNameKTP) ? $fileNameKTP : null;
        $borrower->siu_image = isset($fileNameSIU) ? $fileNameSIU : null;
        $borrower->business_image = isset($fileNameFoto) ? $fileNameFoto : null;
        $saving = $borrower->save();

        if ($saving) {
            return redirect()
                ->to('/mitra/profile')
                ->with([
                    'success' => 'Berhasil mengajukan pendanaan'
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

    public function penarikan_dana()
    {

        $data = array(
            'title' => "Aminah | Invoice Penarikan dana",
            'active' => 'profile',
        );
        return view('pages.borrower.invoice', $data);
    }
}
