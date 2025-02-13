<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receiver_id'); // ID penerima pesan (bisa dari users atau pegawais)
            $table->enum('receiver_type', ['user', 'pegawai']); // Menandakan penerima dari tabel mana
            $table->unsignedBigInteger('sender_id'); // ID pengirim (bisa dari users atau pegawais)
            $table->enum('sender_type', ['user', 'pegawai']); // Menandakan pengirim dari tabel mana
            $table->text('message'); // Isi pesan
            $table->timestamps();
        
            // Foreign key jika hanya pemilik toko yang menerima pesan
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
}