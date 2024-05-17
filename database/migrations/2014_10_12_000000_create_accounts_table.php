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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tim')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'uiux', 'olymp']);
            $table->string('asal_sekolah');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('bukti_bayar')->nullable();
            $table->enum('status_bayar', ['empty', 'unverified', 'verified', 'failed'])->default('empty');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
