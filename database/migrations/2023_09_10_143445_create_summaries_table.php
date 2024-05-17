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
        Schema::create('summaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('soal_id');
            $table->foreignId('account_id');
            $table->foreignId('option_id')->nullable();
            $table->boolean('answer_status')->nullable();
            $table->timestamps();
            $table->integer('no_soal');
            $table->integer('score')->nullable();
            $table->string('answer')->nullable();
            $table->boolean('current_soal')->default(false);

            $table->foreign('account_id')->references('id')->on('accounts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('soal_id')->references('id')->on('soals')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('option_id')->references('id')->on('options')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('summaries');
    }
};
