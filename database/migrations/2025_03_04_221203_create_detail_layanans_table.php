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
            $table->ulid('id')->primary();
            $table->timestamps();
            $table->integer('price');
            $table->text('description')->nullable();
            $table->string('photos')->nullable();
            $table->boolean('status')->default(false);
            $table->foreignUlid('layananId')->constrained('layanans', 'id')->delete('cascade');
            $table->foreignUlid('petHouseId')->constrained('pet_houses', 'id')->delete('cascade');
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
