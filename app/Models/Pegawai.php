<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    /** @use HasFactory<\Database\Factories\PegawaiFactory> */
    use HasFactory;
    
    // Menambahkan atribut yang bisa diisi (mass assignable)
    protected $fillable = [
        'no_pegawai',
        'nama',
        'ttl',
        'alamat',
        'no_hp',
    ];
}