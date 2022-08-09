<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LenderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PengajuanController;
use App\Http\Controllers\Admin\MitraController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// login admin
Route::get('/admin/login', [LoginController::class, 'login_admin'])->name('admin.login');
Route::post('/admin/login', [AuthenticatedSessionController::class, 'store']);

// register borrower
Route::get('/mitra/daftar', [RegisterController::class, 'registerBorrower']);
Route::post('/mitra/daftar', [RegisterController::class, 'storeBorrower']);

// register lender
Route::get('/register', [RegisterController::class, 'registerLender']);
Route::post('/lender/daftar', [RegisterController::class, 'storeLender']);

// admin
Route::middleware('admin')->group(function () {
    // dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // user
    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user');
    // pengajuan
    Route::get('/admin/pengajuan', [PengajuanController::class, 'index'])->name('admin.borrower');
    Route::get('/admin/pengajuan/detail/{borrower}', [PengajuanController::class, 'detail'])->name('admin.borrower.detail');
    Route::post('/admin/pengajuan/terima', [PengajuanController::class, 'approve'])->name('admin.borrower.approve');
    Route::post('/admin/pengajuan/tolak', [PengajuanController::class, 'reject'])->name('admin.borrower.reject');
    // data mitra
    Route::get('/admin/mitra', [MitraController::class, 'index'])->name('admin.partner');
    Route::get('/admin/mitra/detail/{borrower}', [MitraController::class, 'detail'])->name('admin.partner.detail');

    Route::get('/rincian-pendanaan', [AdminController::class, 'rincian_pendanaan']);
    Route::get('/rincian-pendanaan/detail', [AdminController::class, 'detail_rincian_pendanaan']);
    Route::get('/data-keuangan', [AdminController::class, 'data_keuangan']);
    Route::get('/data-keuangan/detail', [AdminController::class, 'detail_keuangan']);
});

// mitra
Route::middleware('borrower')->group(function () {
    Route::get('/mitra/profile', [BorrowerController::class, 'index'])->name('borrower.profile');
});

// lender
Route::middleware('lender')->group(function () {
    Route::get('/lender/home', [LenderController::class, 'index'])->name('lender');
    Route::get('/lender/profile', [LenderController::class, 'profile'])->name('lender.profile');
    Route::get('/lender/mitra', [LenderController::class, 'mitra'])->name('lender.mitra');
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/tentang-kami', [HomeController::class, 'about']);
Route::get('/cara-kerja', [HomeController::class, 'how_to_work']);
Route::get('/login', [LoginController::class, 'index']);
Route::get('/forgot-password', [LoginController::class, 'forgot_password']);
Route::get('/recovery-password', [LoginController::class, 'recovery_password']);
