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
        Schema::create('reports', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->enum('jenis_reports', ['Admin', 'Pet House']);
            $table->text('isi');
            $table->foreignUlid('penitipanId')->nullable()->constrained('penitipans', 'id')->onDelete('cascade');
            $table->foreignUlid('pethouseId')->nullable()->constrained('pet_houses', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
