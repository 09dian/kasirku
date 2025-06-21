<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{

    protected $fillable = [
        'namePembayaran',    
        'namaPemilik',
        'pilihanPembayaran',
        'codePembayaran',
    ];
    /** @use HasFactory<\Database\Factories\PembayaranFactory> */
    use HasFactory;
}
