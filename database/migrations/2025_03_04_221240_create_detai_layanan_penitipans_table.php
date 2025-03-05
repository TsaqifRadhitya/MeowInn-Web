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
        Schema::create('detai_layanan_penitipans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('jumlah');
            $table->integer('subtotak');
            $table->foreignId('fk_detail_layanan')->constrained('detail_layanans','id')->delete('cascade');
            $table->foreignId('fk_hewan')->constrained('hewans','id')->delete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detai_layanan_penitipans');
    }
};
