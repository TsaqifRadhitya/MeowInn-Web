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
            $table->ulid('id')->primary();
            $table->integer('price');
            $table->foreignUlid('detailLayananId')->constrained('detail_layanans', 'id')->delete('cascade');
            $table->foreignUlid('hewanId')->constrained('hewans', 'id')->delete('cascade');
            $table->timestamps();
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
