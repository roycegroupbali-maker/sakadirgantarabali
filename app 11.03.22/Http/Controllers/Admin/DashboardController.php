<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DirgaNews;
use App\Models\Gallery;
use App\Models\Member;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_berita' => DirgaNews::count(),
            'total_galeri' => Gallery::count(),
            'total_anggota' => Member::count(),
        ];

        $beritaTerbaru = DirgaNews::latest('tanggal_publish')->take(5)->get();
        $anggotaTerbaru = Member::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'beritaTerbaru', 'anggotaTerbaru'));
    }
}
