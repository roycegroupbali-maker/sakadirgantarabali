<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

#[Fillable([
    'judul',
    'slug',
    'thumbnail',
    'isi',
    'penulis',
    'tanggal_publish',
    'status',
])]
class DirgaNews extends Model
{
    use HasFactory;

    protected $table = 'dirga_news';

    protected function casts(): array
    {
        return [
            'tanggal_publish' => 'date',
        ];
    }

    /**
     * Scope: hanya berita berstatus publish, digunakan halaman publik.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'publish');
    }

    /**
     * Buat slug unik dari judul.
     */
    public static function generateUniqueSlug(string $judul, ?int $ignoreId = null): string
    {
        $base = Str::slug($judul);
        $slug = $base;
        $i = 1;

        while (
            static::where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base.'-'.(++$i);
        }

        return $slug;
    }

    public function getThumbnailUrlAttribute(): ?string
    {
        return $this->thumbnail ? asset('storage/'.$this->thumbnail) : null;
    }
}
