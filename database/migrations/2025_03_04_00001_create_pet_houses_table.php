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
        Schema::create('pet_houses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('deskripsi');
            $table->boolean('status_pet_house')->default(false);
            $table->boolean('status_penjemputan');
            $table->float('radius_penjemputan')->nullable();
            $table->string('alamat');
            $table->decimal('lat', 10, 8);
            $table->decimal('lng', 11, 8);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pet_houses');
    }
};
