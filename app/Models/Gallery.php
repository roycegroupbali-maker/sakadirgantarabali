<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'judul',
    'foto',
    'deskripsi',
    'tanggal',
])]
class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
        ];
    }

    public function getFotoUrlAttribute(): ?string
    {
        return $this->foto ? asset('storage/'.$this->foto) : null;
    }
}
