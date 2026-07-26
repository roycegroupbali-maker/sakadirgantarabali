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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pendaftaran')->unique();
            $table->string('nama');
            $table->string('email');
            $table->string('no_hp');
            $table->string('asal_sekolah');
            $table->foreignId('pangkalan_id')->nullable()->constrained('pangkalans')->nullOnDelete();
            $table->string('krida')->nullable();
            $table->enum('status', ['Menunggu Verifikasi', 'Dihubungi', 'Diterima', 'Ditolak'])
                ->default('Menunggu Verifikasi');
            $table->text('catatan_admin')->nullable();
            $table->timestamps();

            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
