<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $fillable = [
        'total_penjualan',
        'pengahsilan',
        'jumlah_barang',
        'barang_keluar'
      
    ];
    use HasFactory;
}