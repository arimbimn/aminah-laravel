<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Funding;
use App\Models\Borrower;
use App\Models\Transaction;
use App\Models\BusinessType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\BorrowerStatusType;
use Illuminate\Support\Facades\Auth;

class BorrowerController extends Controller
{
    public function index()
    {
        // dd(Auth::user()->latestBorrower->unfinishedFundings->count());
        $id = Auth::user()->id;
        $user = User::with('latestBorrower')->find($id);
        $pengajuan = Borrower::where('email', Auth::user()->email)->latest()->first();
        $borrowers = Borrower::where('email', Auth::user()->email)->get();
        $fundings = Funding::whereIn('borrower_id', $borrowers->pluck('id'))->get();

        $data = array(
            'title' => "Aminah | Profile",
            'active' => 'profile',
            'user' => $user,
            'pengajuan' => isset($pengajuan) ? $pengajuan : null,
            'fundings' => isset($fundings) ? $fundings : null,
        );

        return view('pages.borrower.profile', $data);
    }

    public function pengajuan_pendanaan()
    {
        $jenis = BusinessType::all();

        if ((isset(Auth::user()->latestBorrower->unfinishedFundings) && Auth::user()->latestBorrower->unfinishedFundings->count() > 0) || (isset(Auth::user()->waitingBorrower) && Auth::user()->waitingBorrower->count() > 0)) {
            return redirect('/mitra/profile')
                ->with([
                    'error' => 'Proses pengajuan pendanaan sedang berlangsung'
                ]);
        }

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
            return redirect('/mitra/profile')
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

    public function withdrawal()
    {
        if (Auth::user()->borrowerAmount() == 0) {
            return redirect('/mitra/profile')
                ->with([
                    'error' => 'Saldo anda kosong'
                ]);
        }

        $data = array(
            'title' => "Aminah | Invoice Penarikan dana",
            'active' => 'profile',
        );
        return view('pages.borrower.invoice', $data);
    }

    public function storeWithdrawal(Request $request)
    {
        $user_amount = Auth::user()->borrowerAmount();
        $user_id = Auth::user()->id;

        $this->validate($request, [
            'bankName' => 'required',
            'pemilikRekeningName' => 'required',
            'nomorRekening' => 'required',
            'jumlahSaldo' => "required|numeric|max:$user_amount",
        ]);

        $bankName = $request->input('bankName');
        $accountName = $request->input('pemilikRekeningName');
        $accountNumber = $request->input('nomorRekening');
        $withdrawalAmount = $request->input('jumlahSaldo');

        $transaction = new Transaction();
        $transaction->trx_hash = md5($user_id . now());
        $transaction->transaction_type = '4';
        $transaction->status = 'waiting';
        $transaction->user_id = $user_id;
        $transaction->borrower_user_id = $user_id;
        $transaction->transaction_amount = $withdrawalAmount;
        $transaction->recepient_name = $accountName;
        $transaction->recepient_account_number = $accountNumber;
        $transaction->bank_name = $bankName;
        $saving = $transaction->save();

        if ($saving) {
            return redirect('/mitra/profile')
                ->with([
                    'success' => 'Berhasil mengajukan permintaan penarikan saldo'
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

    public function returnFunding(Funding $funding)
    {
        // block disini kalo akses data orang lain
        if ($funding->borrower->user->id != Auth::user()->id) {
            return redirect('/mitra/profile')
                ->with([
                    'error' => 'Maaf, anda berusaha akses data orang lain'
                ]);
        }
        $transactions = Transaction::where('transaction_type', '7')->where('user_id', Auth::user()->id)->orderBy('transaction_date', 'Asc')->get();

        $data = array(
            'title' => "Aminah | Pengembalian pendanaan",
            'active' => 'profile',
            'funding' => $funding,
            'transactions' => $transactions,
        );
        return view('pages.borrower.return_funding', $data);
    }

    public function returnFundingDetail($trx_hash)
    {
        dd($trx_hash);
    }

    public function storeReturnFunding(Request $request)
    {
    }
}
