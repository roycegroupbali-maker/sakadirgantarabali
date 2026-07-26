<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

#[Fillable([
    'nomor_tiket',
    'kategori',
    'judul',
    'deskripsi',
    'nama',
    'email',
    'no_hp',
    'instansi',
    'kota',
    'lokasi_kejadian',
    'tanggal_kejadian',
    'jam_kejadian',
    'kerahasiaan',
    'lampiran',
    'status',
    'riwayat',
])]
class Aspiration extends Model
{
    use HasFactory;

    public const STATUS_OPTIONS = [
        'Menunggu Verifikasi',
        'Sedang Diproses',
        'Diteruskan ke Instansi Terkait',
        'Selesai',
        'Ditolak',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_kejadian' => 'date',
            'lampiran' => 'array',
            'riwayat' => 'array',
        ];
    }

    /**
     * Buat nomor tiket unik berformat LAP-{tahun}-{urutan 4 digit}.
     */
    public static function generateNomorTiket(): string
    {
        $tahun = now()->year;

        return DB::transaction(function () use ($tahun) {
            $terakhir = static::where('nomor_tiket', 'like', "LAP-{$tahun}-%")
                ->lockForUpdate()
                ->count();

            $urutan = str_pad((string) ($terakhir + 1), 4, '0', STR_PAD_LEFT);

            return "LAP-{$tahun}-{$urutan}";
        });
    }

    /**
     * Tambahkan satu entri ke riwayat/timeline laporan.
     */
    public function tambahRiwayat(string $catatan): void
    {
        $riwayat = $this->riwayat ?? [];
        $riwayat[] = [
            'catatan' => $catatan,
            'tanggal' => now()->translatedFormat('d M Y, H:i'),
        ];
        $this->riwayat = $riwayat;
    }

    /**
     * Nama pelapor yang aman ditampilkan ke publik (menghormati kerahasiaan).
     */
    public function getNamaPublikAttribute(): string
    {
        return $this->kerahasiaan === 'Anonim' ? 'Anonim' : $this->nama;
    }

    /**
     * URL file lampiran (disimpan di disk publik).
     *
     * @return array<int, string>
     */
    public function getLampiranUrlsAttribute(): array
    {
        return collect($this->lampiran ?? [])
            ->map(fn (string $path) => asset('storage/'.$path))
            ->values()
            ->all();
    }
}
