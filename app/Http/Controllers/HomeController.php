<?php

namespace App\Http\Controllers;

use App\Models\DirgaNews;
use App\Models\Gallery;
use App\Models\Member;
use App\Models\Pangkalan;
use Illuminate\Support\Str;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Nama bulan Bahasa Indonesia, dipakai agar format tanggal tetap sama
     * seperti tampilan lama ("14 Juli 2026") tanpa perlu mengubah locale global.
     */
    private const BULAN = [
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
    ];

    /** Label untuk anggota yang pangkalannya belum terdata/terdaftar. */
    private const PANGKALAN_BELUM_TERDAFTAR = 'Belum Terdaftar';

    /**
     * Tampilkan halaman publik (SPA satu halaman).
     *
     * Tampilan (index.blade.php) TIDAK diubah — hanya sumber data untuk
     * Dirga News dan Galeri yang sebelumnya statis di JavaScript, kini
     * diisi dari database melalui variabel $newsData / $galleryData.
     */
    public function index(): View
    {
        $newsData = DirgaNews::published()
            ->orderByDesc('tanggal_publish')
            ->get()
            ->map(function (DirgaNews $n) {
                $isiBersih = strip_tags($n->isi);
                // Pecah isi berita jadi paragraf terpisah (baris kosong sebagai
                // pemisah) supaya tampilan detail berita bisa dirender rapi
                // per paragraf, bukan satu blok teks panjang tanpa jeda.
                $paragraf = preg_split('/\n\s*\n/', trim($isiBersih));
                $paragraf = array_values(array_filter(array_map('trim', $paragraf)));

                return [
                    'cat' => 'Dirga News',
                    'date' => $this->formatTanggal($n->tanggal_publish),
                    'title' => $n->judul,
                    'excerpt' => Str::limit($isiBersih, 160),
                    'content' => $paragraf,
                    'penulis' => $n->penulis,
                    // Thumbnail yang diunggah lewat Panel Admin. Sebelumnya field ini
                    // tidak dikirim ke tampilan publik sehingga kartu Dirga News
                    // selalu menampilkan ikon generik, bukan foto yang diunggah.
                    'thumbnail' => $n->thumbnail_url,
                ];
            })->values();

        $galleryData = Gallery::orderByDesc('tanggal')
            ->get()
            ->map(fn (Gallery $g) => [
                'cat' => 'Latihan',
                'title' => $g->judul,
                'desc' => $g->deskripsi ?? '',
                // Foto asli yang diunggah lewat Panel Admin. Sebelumnya field ini
                // tidak dikirim ke tampilan publik sehingga kartu galeri selalu
                // menampilkan ikon generik, bukan foto yang baru diunggah.
                'foto' => $g->foto_url,
            ])->values();

        $pangkalanData = Pangkalan::orderBy('nama')
            ->get()
            ->map(fn (Pangkalan $p) => [
                'id' => $p->id,
                'nama' => $p->nama,
                'kota' => $p->kota,
                'lat' => $p->lat,
                'lng' => $p->lng,
            ])->values();

        // Semua anggota tampil di daftar publik. Anggota yang belum punya pangkalan
        // diberi label "Belum Terdaftar" dan otomatis tidak dihitung di peta
        // sebaran (peta hanya membaca anggota yang memiliki pangkalanId). Pangkalan
        // dapat dilengkapi kapan saja lewat Panel Admin.
        $membersData = Member::query()
            ->with('pangkalan')
            ->orderBy('nama')
            ->get()
            ->map(function (Member $m) {
                $sertifikasi = $m->krida
                    ? 'SKK '.$m->krida.($m->jenjang ? ' — '.$m->jenjang : '')
                    : '-';

                return [
                    'id' => $m->nomor_anggota,
                    'nama' => $m->nama,
                    'angkatan' => $m->angkatan ?? '-',
                    'pangkalan' => $m->pangkalan?->nama ?? self::PANGKALAN_BELUM_TERDAFTAR,
                    'kota' => $m->pangkalan?->kota,
                    'lat' => $m->pangkalan?->lat,
                    'lng' => $m->pangkalan?->lng,
                    'pangkalanId' => $m->pangkalan_id,
                    'krida' => $m->krida ?? '-',
                    'sertifikasi' => $sertifikasi,
                    'jabatan' => $m->jabatan ?? 'Anggota',
                    // Tampilan lama hanya mengenal 2 status ("Aktif"/"Tidak Aktif"),
                    // sedangkan skema database punya 3 (Aktif/Alumni/Non Aktif).
                    'status' => $m->status === 'Aktif' ? 'Aktif' : 'Tidak Aktif',
                ];
            })->values();

        return view('index', compact('newsData', 'galleryData', 'pangkalanData', 'membersData'));
    }

    private function formatTanggal($date): string
    {
        return $date->day.' '.self::BULAN[(int) $date->month].' '.$date->year;
    }
}