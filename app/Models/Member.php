<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'nama',
    'nomor_anggota',
    'jenis_kelamin',
    'tempat_lahir',
    'tanggal_lahir',
    'agama',
    'alamat',
    'no_hp',
    'email',
    'asal_sekolah',
    'pangkalan_id',
    'angkatan',
    'jenjang',
    'krida',
    'jabatan',
    'foto',
    'status',
])]
class Member extends Model
{
    use HasFactory;

    protected $table = 'members';

    /**
     * Pilihan tetap untuk field "Jenjang" (jenjang kecakapan SKK).
     */
    public const JENJANG_OPTIONS = ['Purwa', 'Madya', 'Utama'];

    /**
     * Pilihan tetap untuk field "Angkatan". Diurut dari yang terbaru.
     */
    public const ANGKATAN_OPTIONS = [
        'Angkatan XXII (2026)',
        'Angkatan XXI (2025)',
        'Angkatan XX (2024)',
        'Angkatan XIX (2023)',
        'Angkatan XVIII (2022)',
        'Angkatan XVII (2021)',
        'Angkatan XVI (2020)',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_lahir' => 'date',
        ];
    }

    public function pangkalan(): BelongsTo
    {
        return $this->belongsTo(Pangkalan::class);
    }

    public function scopeAktif($query)
    {
        return $query->where('status', 'Aktif');
    }

    public function getFotoUrlAttribute(): ?string
    {
        return $this->foto ? asset('storage/'.$this->foto) : null;
    }
}
