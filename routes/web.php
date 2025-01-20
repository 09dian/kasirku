<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\LoginPegawaiController;




Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/', [LoginController::class, 'ActionLogin'])->middleware('guest')-> name('login');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('register', [RegisterController::class, 'register'])->middleware('guest')-> name('register');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest')-> name('register');

Route::get('forgot', [ForgotController::class, 'forgot'])->middleware('guest')->name('forgot');

//code yang sudah login
Route::get('/home', function () {
   return view('home.home',['title'=>'Home']);
})->middleware(['auth'])->name('home'); // home

Route::get('/produk', function(){
    return view('home.produk',['title'=>'Produk']); 
})->middleware(['auth'])->name('produk'); // produk




// settings
Route::get('settings',[SettingsController::class,'settings'])->middleware('auth')->name('settings');
Route::put('settings',[SettingsController::class,'create'])->middleware('auth')->name('settings');

// pegawai 
Route::get('pegawai',[PegawaiController::class,'pegawai'])->middleware('auth')->name('pegawai');
Route::post('pegawai',[PegawaiController::class,'create'])->middleware('auth')->name('pegawai');


Route::get('/pos', function(){
    return view('home.pos',['title'=>'Pos']); 
})->middleware(['auth'])->name('pos'); 
// bisa di akses oleh pemilik toko dan pekerja(pegawai)

//login pegawai
Route::post('login_pegawai', [LoginPegawaiController::class, 'ActionLogin'])->middleware('guest')->name('login_pegawai');
Route::get('home_pegawai', [LoginPegawaiController::class, 'index'])->name('home_pegawai');
Route::post('/logout_pegawai', [LoginPegawaiController::class, 'logout'])->middleware('auth')->name('logout_pegawai');