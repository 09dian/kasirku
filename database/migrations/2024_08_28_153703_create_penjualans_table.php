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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id(); // Kolom ID (Primary Key)
            $table->string('order'); // Kolom untuk Order
            $table->string('product'); // Kolom untuk Product
            $table->string('customer'); // Kolom untuk Customer
            $table->date('date'); // Kolom untuk Date
            $table->string('status'); // Kolom untuk Status
            $table->integer('jumlah'); // Kolom untuk Jumlah
            $table->decimal('total', 10, 2); // Kolom untuk Total dengan 2 desimal
            $table->timestamps(); // Kolom timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
