<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Pegawai extends Authenticatable
{
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

    // Relasi ke user (pemilik)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Pesan yang dikirim oleh pegawai
    public function sentMessages()
    {
        return $this->morphMany(Message::class, 'sender');
    }

    // Pesan yang diterima oleh pegawai
    public function receivedMessages()
    {
        return $this->morphMany(Message::class, 'receiver');
    }
}