<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['nama_produk', 'id_category', 'harga', 'stok'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}