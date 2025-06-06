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
            $table->ulid('id')->primary();
            $table->enum('status', ['menunggu pembayaran', 'gagal', 'menunggu penjemputan', 'menunggu diantar ke pethouse', 'sedang dititipkan', 'selesai'])->default('menunggu pembayaran');
            $table->integer('duration');
            $table->integer('petCareCosts');
            $table->text('address');
            $table->foreignId('villageId')->constrained('villages');
            $table->boolean('isCash')->default(false);
            $table->boolean('isPickUp')->default(false);
            $table->timestamps();
            $table->foreignUlid('userId')->constrained('users', 'id')->delete('cascade');
            $table->foreignUlid('petHouseId')->constrained('pet_houses', 'id')->delete('cascade');
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
