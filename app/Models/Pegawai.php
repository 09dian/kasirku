<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Pegawai extends Authenticatable
{
    // Pastikan model ini mewarisi Authenticatable
    protected $fillable = [
        'id_user',
        'no_pegawai',
        'password',
        'nama',
        'ttl',
        'alamat',
        'no_hp',
        'nama_toko',
        'terakhir_login',
    ];

    protected $hidden = [
        'password',
    ];
}