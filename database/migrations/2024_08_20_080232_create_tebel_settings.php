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
        Schema::create('tebel_settings', function (Blueprint $table) {
            $table->id(); // ID auto-increment
            $table->string('nama_toko'); // Kolom untuk nama toko
            $table->string('nama_pemilik'); // Kolom untuk nama pemilik
            $table->string('email_toko'); // Kolom untuk email toko
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tebel_settings');
    }
};
