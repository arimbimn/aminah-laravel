<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrower;
use App\Models\BorrowerStatusType;

class RegisterController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Aminah | Register',
        );
        return view('pages/register/register_lender', $data);
    }

    public function registerBorrower()
    {
        $data = array(
            'title' => 'Aminah | Register Calon Mitra',
        );
        return view('pages/register/register_borrower', $data);
    }

    public function storeBorrower(Request $request)
    {

        $this->validate($request, [
            'umkmName' => 'required',
            'fullName' => 'required',
            'umkmAddress' => 'required',
            'homeAddress' => 'required',
            'nik' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required',
            'accountNumber' => 'required',
            'income' => 'required',
            'amount' => 'required',
            'file-ktp' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'file-siu' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'file-foto-umkm' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'approvedCheck' => 'required',
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
        $borrower->name = $request->input('fullName');
        $borrower->email = $request->input('email');
        $borrower->phone_number = $request->input('phoneNumber');
        $borrower->nik = $request->input('nik');
        $borrower->address = $request->input('homeAddress');
        $borrower->status = isset($status) ? $status->name : 'Pending';
        $borrower->business_name = $request->input('umkmName');
        $borrower->business_address = $request->input('umkmAddress');
        $borrower->borrower_monthly_income = $request->input('income');
        $borrower->borrower_first_submission = $request->input('amount');
        $borrower->ktp_image = isset($fileNameKTP) ? $fileNameKTP : null;
        $borrower->siu_image = isset($fileNameSIU) ? $fileNameSIU : null;
        $borrower->business_image = isset($fileNameFoto) ? $fileNameFoto : null;
        $saving = $borrower->save();

        if ($saving) {
            return redirect()
                ->to('/')
                ->with([
                    'success' => 'Berhasil mengajukan pendaftaran mitra'
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
