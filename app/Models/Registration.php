<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

#[Fillable([
    'kode_pendaftaran',
    'nama',
    'email',
    'no_hp',
    'asal_sekolah',
    'pangkalan_id',
    'krida',
    'status',
    'catatan_admin',
])]
class Registration extends Model
{
    use HasFactory;

    public const STATUS_OPTIONS = ['Menunggu Verifikasi', 'Dihubungi', 'Diterima', 'Ditolak'];

    public function pangkalan(): BelongsTo
    {
        return $this->belongsTo(Pangkalan::class);
    }

    /**
     * Buat kode pendaftaran unik berformat REG-{tahun}-{urutan 4 digit}.
     */
    public static function generateKodePendaftaran(): string
    {
        $tahun = now()->year;

        return DB::transaction(function () use ($tahun) {
            $terakhir = static::where('kode_pendaftaran', 'like', "REG-{$tahun}-%")
                ->lockForUpdate()
                ->count();

            $urutan = str_pad((string) ($terakhir + 1), 4, '0', STR_PAD_LEFT);

            return "REG-{$tahun}-{$urutan}";
        });
    }
}
