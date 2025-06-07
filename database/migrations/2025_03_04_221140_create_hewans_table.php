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
        Schema::create('hewans', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('foto');
            $table->text('description');
            $table->foreignUlid('penitipanId')->constrained('penitipans', 'id')->ondelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hewans');
    }
};
