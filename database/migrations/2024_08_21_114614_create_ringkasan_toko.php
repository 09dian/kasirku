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
        Schema::create('ringkasan_toko', function (Blueprint $table) {
            $table->id();
            $table->integer('total_barang');
            $table->integer('total_order');
            $table->integer('penghasilan');
            $table->integer('pengeluaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ringkasan_toko');
    }
};
