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
            $table->float('radius_penjemputan')->nullable();
            $table->string('alamat');
            $table->integer('penalty')->default(0);
            $table->decimal('lat', 10, 8);
            $table->decimal('lng', 11, 8);
            $table->boolean('status_buka_pet_house')->default(true);
            $table->boolean('status_penjemputan');
            $table->boolean('status_verifikasi')->default(false);
            $table->foreignId('fk_user')->constrained('users','id')->onDelete('cascade');
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
