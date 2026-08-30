<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    'krida',
    'jabatan',
    'foto',
    'status',
])]
class Member extends Model
{
    use HasFactory;

    protected $table = 'members';

    protected function casts(): array
    {
        return [
            'tanggal_lahir' => 'date',
        ];
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
