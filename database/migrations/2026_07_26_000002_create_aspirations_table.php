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
        Schema::create('aspirations', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_tiket')->unique();
            $table->string('kategori');
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('nama');
            $table->string('email');
            $table->string('no_hp');
            $table->string('instansi')->nullable();
            $table->string('kota');
            $table->string('lokasi_kejadian');
            $table->date('tanggal_kejadian');
            $table->string('jam_kejadian')->nullable();
            $table->enum('kerahasiaan', ['Publik', 'Rahasia', 'Anonim'])->default('Publik');
            $table->json('lampiran')->nullable();
            $table->enum('status', [
                'Menunggu Verifikasi',
                'Sedang Diproses',
                'Diteruskan ke Instansi Terkait',
                'Selesai',
                'Ditolak',
            ])->default('Menunggu Verifikasi');
            $table->json('riwayat')->nullable();
            $table->timestamps();

            $table->index('status');
            $table->index('kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirations');
    }
};
