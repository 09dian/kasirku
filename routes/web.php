<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\RegisterController;

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/', [LoginController::class, 'ActionLogin'])->middleware('guest')-> name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'register'])->middleware('guest')-> name('register');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest')-> name('register');

Route::get('forgot', [ForgotController::class, 'forgot'])->name('forgot');

//code yang sudah login
Route::get('/home', function () {
   return view('home.home',['title'=>'Home']);
})->middleware(['auth']); // 