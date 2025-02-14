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
            // Sender (pengirim)
            $table->unsignedBigInteger('sender_id');
            $table->string('sender_type');
            // Receiver (penerima)
            $table->unsignedBigInteger('receiver_id');
            $table->string('receiver_type');
            // Pesan
            $table->text('message');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
}