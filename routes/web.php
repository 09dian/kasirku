<?php

use App\Models\Hasil;
use App\Models\Kategori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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

// settings
Route::get('/settings', [SettingsController::class, 'settings'])->middleware('auth')->name('settings');
Route::put('/settings', [SettingsController::class, 'create'])->middleware('auth')->name('settings');

//pesan
Route::get('/notifikasi', [MessageController::class, 'index'])->middleware('auth')->name('notifikasi');
Route::post('/messages', [MessageController::class, 'create'])->middleware('auth')->name('messages');

// pegawai 
Route::get('/pegawai', [PegawaiController::class, 'pegawai'])->middleware('auth')->name('pegawai');
Route::post('/pegawai', [PegawaiController::class, 'create'])->middleware('auth')->name('pegawai');

//login pegawai
Route::post('/login_pegawai', [LoginPegawaiController::class, 'ActionLogin'])->middleware('guest')->name('login_pegawai');
Route::get('/home_pegawai', [LoginPegawaiController::class, 'index'])
    ->middleware('auth:pegawai') // Middleware untuk autentikasi guard pegawai
    ->name('home_pegawai');

Route::get('/logout_pegawai', [LoginPegawaiController::class, 'logout'])
    ->middleware('auth:pegawai') // Pastikan hanya pegawai yang login yang bisa mengakses
    ->name('logout_pegawai');

// Route Home (Akses oleh Auth atau Pemilik
Route::get('/home', function () {
    $hasil=Hasil::latest()->first();
    return view('home.home', compact('hasil'),['title' => 'Home Pemilik']);
})->middleware('auth')->name('home');// home

Route::get('/pos', function () {
    return view('home.pos', ['title' => 'Pos']);
})->middleware('auth')->name('pos');//pos

Route::get('/produk', [ProdukController::class,'index'])->middleware('auth')->name('produk');
Route::post('/tambah_produk', [ProdukController::class, 'store'])->middleware('auth')->name('tambah_produk');
Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->middleware('auth')->name('produk_delete');
Route::patch('/produk/{id}', [ProdukController::class, 'update'])->middleware('auth')->name('produk_update');

Route::get('/tambah_produk', function () {
    $kategori= Kategori::all();
    return view('home.tambah_produk', compact('kategori'),['title' => 'Produk']);
})->middleware('auth')->name('tambah_produk'); //produk

// kategori
Route::get('/kategori',[KategoriController::class,'index'])->middleware('auth')->name('kategori');
Route::post('/tambah_kategori',[KategoriController::class,'create'])->middleware('auth')->name('tambah_kategori');
Route::delete('/kategori/{id}',[KategoriController::class,'destroy'])->middleware('auth')->name('kategori_delete');
Route::patch('/kategori/{id}', [KategoriController::class, 'update'])->middleware('auth')->name('kategori_update');

Route::get('/tambah_kategori', function () {
    return view('home.tambah_kategori', ['title' => 'Produk']);
})->middleware('auth')->name('tambah_kategori'); //kategori