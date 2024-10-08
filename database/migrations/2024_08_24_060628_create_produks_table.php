<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('produks', function (Blueprint $table) {
        $table->id(); // ID auto-increment
        $table->string('nama_produk'); // Nama produk
        
        $table->string('id_category'); // Tipe makanan
        $table->integer('harga'); // Harga produk
        $table->integer('stok'); // Stok produk
        $table->string('gambar')->nullable(); // Menambahkan kolom gambar
        $table->timestamps(); // Kolom created_at dan updated_at
    });
}

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
