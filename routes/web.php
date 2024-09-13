<?php 


use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('app.index', [
        'title' => "Toko",
        'total_barang' => 1000,
        'total_order' => 2000,
        'penghasilan' => 4500000,
        'pengeluaran' => 60000,
    ]);
});

Route::resource('/penjualan', PenjualanController::class);
Route::resource('/category', CategoryController::class);

Route::resource('/produk', ProdukController::class);


Route::get('settings', function () {
    return view('app.settings', [
        'title' => 'Settings',
    ]);
});