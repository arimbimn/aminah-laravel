<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LenderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// login admin
Route::get('/admin/login', [LoginController::class, 'login_admin']);
Route::post('login', [AuthenticatedSessionController::class, 'store']);

// admin
Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/borrower/register', [RegisterController::class, 'registerBorrower']);
Route::post('/borrower/register', [RegisterController::class, 'storeBorrower']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/tentang-kami', [HomeController::class, 'about']);
Route::get('/cara-kerja', [HomeController::class, 'how_to_work']);
Route::get('/home', [LenderController::class, 'index']);
Route::get('/mitra', [LenderController::class, 'mitra']);
Route::get('/profile', [LenderController::class, 'profile']);
Route::get('/login', [LoginController::class, 'index']);

Route::get('/forgot-password', [LoginController::class, 'forgot_password']);
Route::get('/recovery-password', [LoginController::class, 'recovery_password']);
Route::get('/borrower/profile', [BorrowerController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);


Route::get('/data-pengajuan-masuk', [AdminController::class, 'data_pengajuan_masuk']);
Route::get('/data-pengajuan-masuk/detail', [AdminController::class, 'detail_pengajuan_masuk']);
Route::get('/rincian-pendanaan', [AdminController::class, 'rincian_pendanaan']);
Route::get('/rincian-pendanaan/detail', [AdminController::class, 'detail_rincian_pendanaan']);
Route::get('/data-mitra', [AdminController::class, 'data_mitra']);
Route::get('/data-mitra/detail', [AdminController::class, 'detail_data_mitra']);
Route::get('/data-keuangan', [AdminController::class, 'data_keuangan']);
Route::get('/data-keuangan/detail', [AdminController::class, 'detail_keuangan']);
Route::get('/admin/data', [AdminController::class, 'data_admin']);
