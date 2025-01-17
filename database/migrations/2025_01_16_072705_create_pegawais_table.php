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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('no_pegawai')->unique(); 
            $table->string('nama'); //nama
            $table->string('ttl'); //ttl
            $table->text('alamat'); //alamat
            $table->string('no_hp'); //nomor hp
            $table->timestamp('terakhir_login')->nullable(); // Terakhir Login
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};