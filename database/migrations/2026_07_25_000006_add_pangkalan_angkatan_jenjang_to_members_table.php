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
        Schema::table('members', function (Blueprint $table) {
            $table->foreignId('pangkalan_id')->nullable()->after('id')
                ->constrained('pangkalans')->nullOnDelete();
            $table->string('angkatan')->nullable()->after('asal_sekolah');
            $table->string('jenjang')->nullable()->after('angkatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropConstrainedForeignId('pangkalan_id');
            $table->dropColumn(['angkatan', 'jenjang']);
        });
    }
};
