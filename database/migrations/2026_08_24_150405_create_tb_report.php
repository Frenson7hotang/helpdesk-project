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
        Schema::create('tb_report', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nama');
            $table->string('nik');
            $table->string('dept');
            $table->date('tanggal');
            $table->string('laporan');
            $table->string('dept_tujuan');
            $table->integer('no_hp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_report');
    }
};
