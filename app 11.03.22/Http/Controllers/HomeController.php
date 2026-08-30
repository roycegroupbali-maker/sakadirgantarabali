<?php

namespace App\Http\Controllers;

use App\Models\DirgaNews;
use App\Models\Gallery;
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
            ->map(fn (DirgaNews $n) => [
                'cat' => 'Dirga News',
                'date' => $this->formatTanggal($n->tanggal_publish),
                'title' => $n->judul,
                'excerpt' => Str::limit(strip_tags($n->isi), 160),
                'content' => strip_tags($n->isi),
            ])->values();

        $galleryData = Gallery::orderByDesc('tanggal')
            ->get()
            ->map(fn (Gallery $g) => [
                'cat' => 'Latihan',
                'title' => $g->judul,
                'desc' => $g->deskripsi ?? '',
            ])->values();

        return view('index', compact('newsData', 'galleryData'));
    }

    private function formatTanggal($date): string
    {
        return $date->day.' '.self::BULAN[(int) $date->month].' '.$date->year;
    }
}
