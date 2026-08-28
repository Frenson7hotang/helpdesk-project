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
        Schema::create('tb_user', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('nama');
            $table->string('nik');
            $table->date('tanggal');
            $table->string('role');
            $table->string('dept');
            $table->string('email');
            $table->integer('no_hp');
            $table->string('password');
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_user');
    }
};
