<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app.index',
    [
        'title'=> "Toko",
        "total_barang"=>1000,
        "total_order"=>2000,
        "penghasilan"=>4500000,
        "pengeluaran"=>60000,
    
        
    ]

);
});

Route::get('penjualan', function () {
    return view('app.penjualan',
    [
        'title'=> 'Penjualan',
     
    ]);
});


Route::get('orders', function () {
    return view('app.orders',['title'=> 'Orders', 
    'orders'=>[
           [
            'nama_produk'=>'Nasi Padang',
            'tipe'=>'Makanan Berat',
            'harga'=>42000,
            'stok'=>12,
            'upload'=> '12 Agustus 2024'
           ],
           [
            'nama_produk'=>'Nasi Padang Kumplit',
            'tipe'=>'Makanan Berat',
            'harga'=>50000,
            'stok'=>12,
            'upload'=> '12 Agustus 2024'
           ]
        ]
      
    ]);
});



Route::get('settings', function () {
    return view('app.settings',
    [
        'title'=>'Settings'
      
    ]);
});