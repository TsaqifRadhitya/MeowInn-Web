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
            $table->id();
            $table->timestamps();
            $table->enum('jenis_reports',['Admin','Pet House']);
            $table->text('isi');
            $table->foreignId('fk_user')->constrained('users','id')->delete('cascade');
            $table->foreignId('tujuan')->nullable()->constrained('pet_houses','id')->delete('cascade');
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
