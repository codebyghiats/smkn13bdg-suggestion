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
        Schema::create('kehadiran_guru', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('mata_pelajaran');
            $table->enum('status', ['hadir', 'tidak_hadir', 'izin', 'sakit']);
            $table->string('alasan')->nullable();
            $table->date('tanggal');
            $table->time('waktu_masuk')->nullable();
            $table->time('waktu_keluar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehadiran_guru');
    }
};
