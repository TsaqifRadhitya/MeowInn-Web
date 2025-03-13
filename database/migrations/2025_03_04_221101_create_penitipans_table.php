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
        Schema::create('penitipans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('durasi');
            $table->integer('total');
            $table->enum('status_pembayaran', ['Menunggu Pembayaran', 'Sudah dibayar']);
            $table->enum('status_penitipan', ['Menunggu Penjemputan', 'Dalam Penitipan', 'Selesai']);
            $table->foreignId('fk_user')->constrained('users', 'id')->delete('cascade');
            $table->foreignId('fk_pet_house')->constrained('pet_houses', 'id')->delete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penitipans');
    }
};
