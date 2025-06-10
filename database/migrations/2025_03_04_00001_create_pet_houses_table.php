<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pet_houses', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name')->unique();
            $table->text('description');
            $table->integer('petCareCost');
            $table->json('locationPhotos');
            $table->integer('penalty')->default(0);
            $table->boolean('isOpen')->default(false);
            $table->enum('verificationStatus', ['menunggu persetujuan', 'ditolak', 'disetujui'])->default('menunggu persetujuan');
            $table->boolean('pickUpService')->default(false);
            $table->enum('range', ['village', 'district', 'district'])->nullable();
            $table->foreignUlid('userId')->constrained('users', 'id')->onDelete('cascade');
            $table->timestamps();
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
