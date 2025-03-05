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
        Schema::create('detail_layanans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('harga');
            $table->enum('status_pengajuan',['Menunggu Persetujuan','Disetujui']);
            $table->foreignId('fk_layanan')->constrained('layanans','id')->delete('cascade');
            $table->foreignId('fk_pet_house')->constrained('pet_houses','id')->delete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_layanans');
    }
};
