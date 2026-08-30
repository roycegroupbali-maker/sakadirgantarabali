<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Pangkalan yang otomatis dibuat dari formulir pendaftaran publik belum
     * tentu punya data kota/koordinat peta, jadi kolom ini dilonggarkan
     * menjadi opsional. Admin bisa melengkapinya lewat Panel Admin.
     */
    public function up(): void
    {
        Schema::table('pangkalans', function (Blueprint $table) {
            $table->string('kota')->nullable()->change();
            $table->decimal('lat', 10, 7)->nullable()->change();
            $table->decimal('lng', 10, 7)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pangkalans', function (Blueprint $table) {
            $table->string('kota')->nullable(false)->change();
            $table->decimal('lat', 10, 7)->nullable(false)->change();
            $table->decimal('lng', 10, 7)->nullable(false)->change();
        });
    }
};
