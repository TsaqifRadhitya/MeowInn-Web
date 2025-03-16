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
            $table->text('deskripsi');
            $table->json('url');
            $table->float('radius_penjemputan')->nullable();
            $table->string('alamat');
            $table->string('kabupaten');
            $table->decimal('lat', 10, 8);
            $table->decimal('lng', 11, 8);
            $table->integer('penalty')->default(0);
            $table->boolean('status_buka_pet_house')->default(true);
            $table->boolean('status_penjemputan');
            $table->enum('status_verifikasi',['menunggu persetujuan','ditolak','disetujui']);
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
