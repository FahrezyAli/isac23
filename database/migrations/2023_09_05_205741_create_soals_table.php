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
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('soal');
            $table->enum('babak', ['penyisihan', 'semifinal']);
            $table->float('nilai')->nullable();
            $table->text('gambar_soal')->nullable();
            $table->text('jawaban')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soals');
    }
};
