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
            $table->unsignedBigInteger('id_user'); // Foreign key ke tabel users
            $table->string('no_pegawai')->unique(); 
            $table->string('password');
            $table->string('nama'); 
            $table->string('ttl'); 
            $table->text('alamat'); 
            $table->string('no_hp'); 
            $table->string('nama_toko');
            $table->string('gambar')->default('user.png');            
            $table->timestamp('terakhir_login')->nullable(); 
            $table->timestamps();
        
            // Foreign key constraint
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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