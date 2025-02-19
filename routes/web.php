<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\LoginPegawaiController;




Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/', [LoginController::class, 'ActionLogin'])->middleware('guest')->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/register', [RegisterController::class, 'register'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register');
Route::get('forgot', [ForgotController::class, 'forgot'])->middleware('guest')->name('forgot');
Route::get('/logout_pegawai', [LoginPegawaiController::class, 'logout'])->middleware('auth:pegawai')->name('logout_pegawai'); // Pastikan hanya pegawai yang login yang bisa mengakses
// settings
Route::get('/settings', [SettingsController::class, 'settings'])->middleware('auth')->name('settings');
Route::put('/settings', [SettingsController::class, 'create'])->middleware('auth')->name('settings');

//login pegawai
Route::post('/login_pegawai', [LoginPegawaiController::class, 'ActionLogin'])->middleware('guest')->name('login_pegawai');
Route::get('/home_pegawai', [LoginPegawaiController::class, 'index'])
    ->middleware('auth:pegawai') // Middleware untuk autentikasi guard pegawai
    ->name('home_pegawai');


//pesan
Route::get('/notifikasi/{id}', [MessageController::class, 'index'])->middleware('auth')->name('notifikasi');
Route::post('/messages', [MessageController::class, 'store'])->middleware('auth')->name('messages'); // untuk pemilik

Route::get('/all_pesan',[MessageController::class,'all_pesan'])->middleware('auth')->name('all_pesan');

// pegawai 
Route::get('/pegawai', [PegawaiController::class, 'pegawai'])->middleware('auth')->name('pegawai');
Route::post('/pegawai', [PegawaiController::class, 'create'])->middleware('auth')->name('pegawai');
Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->middleware('auth')->name('delete_pegawai');
Route::patch('/pegawai/{id}', [PegawaiController::class, 'update'])->middleware('auth')->name('edit_pegawai');

// Route produk
Route::get('/produk', [ProdukController::class,'index'])->middleware('auth')->name('produk');
Route::post('/tambah_produk', [ProdukController::class, 'store'])->middleware('auth')->name('tambah_produk');
Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->middleware('auth')->name('produk_delete');
Route::patch('/produk/{id}', [ProdukController::class, 'update'])->middleware('auth')->name('produk_update');
Route::get('/tambah_produk', [ProdukController::class, 'produk'])->middleware('auth')->name('tambah_produk');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/pos', function () {
    return view('home.pos', ['title' => 'Pos']);
})->middleware('auth')->name('pos');
Route::get('/history', function () {
    return view('home.history', ['title' => 'History']);
})->middleware('auth')->name('history');
Route::get('cabang',[CabangController::class,'index'])->middleware('auth')->name('cabang');


// kategori
Route::get('/kategori',[KategoriController::class,'index'])->middleware('auth')->name('kategori');
Route::post('/tambah_kategori',[KategoriController::class,'create'])->middleware('auth')->name('tambah_kategori');
Route::delete('/kategori/{id}',[KategoriController::class,'destroy'])->middleware('auth')->name('kategori_delete');
Route::patch('/kategori/{id}', [KategoriController::class, 'update'])->middleware('auth')->name('kategori_update');
Route::get('/tambah_kategori',[KategoriController::class, 'kategori'])->middleware('auth')->name('tambah_kategori'); //kategorit