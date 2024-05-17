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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('telp');
            $table->enum('status', ['ketua', 'anggota']);
            $table->date('tgl_lahir');
            $table->string('bukti_siswa');
            $table->string('foto_profil')->nullable();
            $table->unsignedBigInteger('account_id')->index('account_id');
            $table->enum('sertifikat', ['belum', 'sudah']);
            $table->timestamps();
        });

        Schema::table('students', function (Blueprint $table) {
            $table->foreign(['account_id'], 'account_fk')->references(['id'])->on('accounts')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
