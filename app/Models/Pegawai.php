<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    /** @use HasFactory<\Database\Factories\PegawaiFactory> */
    use HasFactory;
    
    protected $table = 'pegawais'; // Tentukan nama tabel
    // Menambahkan atribut yang bisa diisi (mass assignable)
    protected $fillable = [
        'id_user',
        'no_pegawai',
        'password',
        'nama',
        'ttl',
        'alamat',
        'no_hp',
    ];
}