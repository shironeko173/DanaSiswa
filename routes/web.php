<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\RegisterController; 
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\PenarikanController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GantiPassController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
 
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

// ============================================== Home ================================================
// Route::get('/home', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::redirect('/home', '/');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/logouts', [LoginController::class, 'logouts']); //for login akun not verify 
 
// ==========================================Super Admin ===============================================

    Route::get('/add-admin', [RegisterController::class, 'tambah'])->middleware('isSuper');
    Route::post('/add-admin', [RegisterController::class, 'addbase']);
// ============================================== Admin ================================================

Route::get('/admin', [DashboardAdminController::class, 'index'])->middleware('isAdmin');
 
// tabungan
Route::get('/tabungan',[TabunganController::class, 'index'])->middleware('isAdmin');

// deposit
Route::get('/deposit/validasi', [DepositController::class, 'validasi'])->middleware('isAdmin');
Route::post('/deposit/update', [DepositController::class, 'update'])->middleware('isAdmin');
Route::post('/deposit/search', [DepositController::class, 'search'])->middleware('isAdmin');
Route::resource('deposit', DepositController::class)->middleware('isAdmin');

// Penarikan
Route::get('/penarikan/validasi', [PenarikanController::class, 'validasi'])->middleware('isAdmin');
Route::post('/penarikan/update', [PenarikanController::class, 'update'])->middleware('isAdmin');
Route::post('/penarikan/search', [PenarikanController::class, 'search'])->middleware('isAdmin');
Route::resource('penarikan', PenarikanController::class)->middleware('isAdmin');

// Users 
Route::get('/users/validasi', [UsersController::class, 'validasi'])->middleware('isAdmin');
Route::post('/users/update', [UsersController::class, 'update'])->middleware('isAdmin');
Route::resource('users', UsersController::class)->middleware('isAdmin');


 
// ============================================== User ================================================

Route::get('/Dashboard', [DashboardUserController::class, 'index'])->middleware('isUser');
Route::Post('/notifupdate', [DashboardUserController::class, 'updatenotif'])->middleware('isUser');
Route::get('/riwayat', [DashboardUserController::class, 'riwayat'])->middleware('isUser');
Route::get('/user', function(){
    return redirect('/Dashboard')->with('success', 'notifikasi');
})->middleware('isUser');

//Riwayat
Route::get('/history', [DashboardUserController::class, 'tampil'])->middleware('isUser');

// deposit
Route::get('/Deposit-User', [DepositController::class, 'deposito'])->middleware('isUser');
Route::post('/deposit/store', [DepositController::class, 'store'])->middleware('isUser');

// Penarikan
Route::get('/Penarikan-User', [PenarikanController::class, 'penarikan'])->middleware('isUser');
Route::post('/penarikan/store', [PenarikanController::class, 'store'])->middleware('isUser');

//Biodata
Route::get('/biodata', function(){
    return view('user.biodata');
})->middleware('isUser');
 
//Ganti Password
Route::get('/gantipassword', [GantiPassController::class, 'edit'])->name('editpass')->middleware('isUser');
Route::post('gantipass/update', [GantiPassController::class, 'update'])->name('ubah')->middleware('isUser');

//FAQ
Route::get('/Frequently-Asked-Questions',[FAQController::class,'user'])->middleware('isUser');


//===============================================Berita==================================================

//kelola berita 
Route::get('/berita/kelola-berita', [DashboardPostController::class,'index'])->middleware('isAdmin');

//preview
Route::get('/berita/posts/{post:slug}', [DashboardPostController::class, 'show'])->middleware('isAdmin'); 

//tambah berita
Route::get('/berita/tambah-berita', [DashboardPostController::class, 'create'])->middleware('isAdmin'); 
Route::post('/berita/tambah', [DashboardPostController::class, 'store'])->middleware('isAdmin'); 

//hapus berita
Route::delete('/berita/hapus/{post:slug}', [DashboardPostController::class, 'destroy'])->middleware('isAdmin');

//edit kategori
Route::get('/berita/edit/{post:slug}', [DashboardPostController::class, 'edit'])->middleware('isAdmin');
Route::put('/berita/ubah/{post:slug}', [DashboardPostController::class, 'update'])->middleware('isAdmin');

 
//========================================Kategori=====================================================

//tambah kategori
Route::get('/kategori/tambah-kategori', [DashboardCategoryController::class, 'create'])->middleware('isAdmin'); 
Route::post('/kategori/tambah', [DashboardCategoryController::class, 'store'])->middleware('isAdmin');

//kelola kategori
Route::get('/kategori/kelola-kategori', [DashboardCategoryController::class,'index'])->middleware('isAdmin');

//edit kategori
Route::get('/kategori/edit/{category:slug}', [DashboardCategoryController::class, 'edit'])->middleware('isAdmin');
Route::put('/kategori/ubah/{category:slug}', [DashboardCategoryController::class, 'update'])->middleware('isAdmin');

//hapus kategori
Route::delete('/kategori/hapus/{category:slug}', [DashboardCategoryController::class, 'destroy'])->middleware('isAdmin');

// ==============================================Blog=============================================================

Route::get('/blog', 'App\Http\Controllers\PostsController@index');
Route::get('/blog/{post:slug}', 'App\Http\Controllers\PostsController@show');
Route::get('/kategori/{kategori:slug}', 'App\Http\Controllers\PostsController@kategori');
 
// ============================================== WEB ============================================================
//tambah FAQ
Route::get('/faq/tambah-faq', [FAQController::class, 'create'])->middleware('isAdmin'); 
Route::post('/faq/tambah', [FAQController::class, 'store'])->middleware('isAdmin');

//kelola FAQ
Route::get('/faq/kelola-faq', [FAQController::class,'index'])->middleware('isAdmin');

//edit FAQ
Route::get('/faq/edit/{faq:slug}', [FAQController::class, 'edit'])->middleware('isAdmin');
Route::put('/faq/ubah/{faq:slug}', [FAQController::class, 'update'])->middleware('isAdmin');

//hapus FAQ
Route::delete('/faq/hapus/{faq:slug}', [FAQController::class, 'destroy'])->middleware('isAdmin');


// ============================================== Forgot Password======================================================
Route::get('/forgot_password', [ForgotPasswordController::class, 'forgot'])->middleware('guest');
Route::post('/forgot_password', [ForgotPasswordController::class, 'password'])->middleware('guest')->name('forgot');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'getPassword'])->name('ResetPasswordGet');
Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('password.reset');