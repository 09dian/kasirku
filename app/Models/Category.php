<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $fillable = ['category','slug', 'status'];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_category');
    }
    
}