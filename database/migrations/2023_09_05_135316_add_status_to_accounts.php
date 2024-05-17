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
        Schema::table('accounts', function (Blueprint $table) {
            $table->enum('status', ['penyisihan', 'semifinalis', 'finalis', 'gagal_penyisihan', 'gagal_semifinal'])->default('penyisihan');

            $table->time('penyisihan_start_time')->nullable();
            $table->time('penyisihan_end_time')->nullable();
            $table->time('penyisihan_duration')->nullable();

            $table->time('semifinal_start_time')->nullable();
            $table->time('semifinal_end_time')->nullable();
            $table->time('semifinal_duration')->nullable();

            $table->integer('nilai_penyisihan')->nullable();
            $table->integer('nilai_semifinal')->nullable();
            $table->integer('nilai_essay')->nullable();
            $table->string('hasil_uiux')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            //
        });
    }
};
