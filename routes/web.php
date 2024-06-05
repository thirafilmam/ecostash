<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenggunaAuthController;
use App\Http\Controllers\JemputController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SamperController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



require __DIR__ . '/auth.php';

// Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::resource('user', 'App\Http\Controllers\UserController');
    Route::resource('nasabah', 'App\Http\Controllers\NasabahController');
    Route::resource('pengemudi', 'App\Http\Controllers\PengemudiController');
    Route::resource('produk', 'App\Http\Controllers\ProdukController');
    Route::resource('pesanan', 'App\Http\Controllers\PesananController');
    Route::resource('samper', 'App\Http\Controllers\SamperController');
    Route::resource('reportuser', 'App\Http\Controllers\ReportUserController');
    Route::resource('reportnasabah', 'App\Http\Controllers\ReportNasabahController');
    Route::resource('reportpengemudi', 'App\Http\Controllers\ReportPengemudiController');
    Route::resource('reportproduk', 'App\Http\Controllers\ReportProdukController');
    Route::resource('reportpesanan', 'App\Http\Controllers\ReportPesananController');


    //cetak pdf
    //Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('cetak_user', 'App\Http\Controllers\ReportUserController@cetak_user')->name('cetak_user');

    //cetak pdf
    //Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('cetak_nasabah', 'App\Http\Controllers\ReportNasabahController@cetak_nasabah')->name('cetak_nasabah');

    //cetak pdf
    //Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('cetak_pengemudi', 'App\Http\Controllers\ReportPengemudiController@cetak_pengemudi')->name('cetak_pengemudi');

    //cetak pdf
    //Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('cetak_produk', 'App\Http\Controllers\ReportProdukController@cetak_produk')->name('cetak_produk');

    //cetak pdf
    //Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('cetak_pesanan', 'App\Http\Controllers\ReportPesananController@cetak_pesanan')->name('cetak_pesanan');
});

// User registration and login routes
Route::get('/client/register', [PenggunaAuthController::class, 'showRegistrationForm'])->name('user.register');
Route::post('/client/register', [PenggunaAuthController::class, 'register']);
Route::get('/client/login', [PenggunaAuthController::class, 'showLoginForm'])->name('user.login');
Route::post('/client/login', [PenggunaAuthController::class, 'login']);

Route::get('/client/login', function () {
    return view('penggunas.login.index');
})->name('client-login');
// Profile routes
Route::middleware(['auth'])->group(function () {
    // The profile page
    Route::get('client/profile', [PenggunaAuthController::class, 'showProfile'])->name('user.profile');
    Route::post('client/logout', [PenggunaAuthController::class, 'logout'])->name('user.logout');
    // The edit profile page
    // Route::get('/profile/edit', [PenggunaAuthController::class, 'edit']); //->name('profile.edit');

    // The update profile route (handle the form submission)
    // Route::put('/profile/update', [PenggunaAuthController::class, 'update']); //->name('profile.update');
    Route::get('profile/riwayat', [PenggunaAuthController::class, 'riwayat'])->name('user.riwayat');

    Route::get('/jemput', [SamperController::class, 'formCust'])->name('jemputSampah.form');
    Route::post('jemputSampah', [SamperController::class, 'storeCust'])->name('jemputSampah.act');
});

Route::get('/', function () {
    return view('penggunas.home');
});

Route::get('/home', function () {
    return view('penggunas.home');
});

Route::get('/layanan-harga-sampah', [ProdukController::class, 'LayananProduk'])->name('layanan.harga.sampah');
Route::get('/layanan-harga-sampah/select', [ProdukController::class, 'LayananSelect'])->name('layanan.harga.sampah.select');


Route::get('/about', function () {
    return view('penggunas.about');
});
Route::get('/contact', function () {
    return view('penggunas.contact');
});
