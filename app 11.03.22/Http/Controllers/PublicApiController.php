<?php

namespace App\Http\Controllers;

use App\Models\DirgaNews;
use App\Models\Gallery;
use App\Models\Member;
use Illuminate\Http\JsonResponse;

class PublicApiController extends Controller
{
    /**
     * Endpoint JSON read-only, disiapkan agar pengembangan tampilan publik
     * lebih lanjut (mis. halaman Data Anggota dengan peta sebaran) dapat
     * mengambil data langsung dari database tanpa perlu mengubah SPA saat ini.
     */
    public function news(): JsonResponse
    {
        return response()->json(
            DirgaNews::published()->orderByDesc('tanggal_publish')->get()
        );
    }

    public function gallery(): JsonResponse
    {
        return response()->json(
            Gallery::orderByDesc('tanggal')->get()
        );
    }

    public function members(): JsonResponse
    {
        return response()->json(
            Member::aktif()->orderBy('nama')->get()
        );
    }
}
