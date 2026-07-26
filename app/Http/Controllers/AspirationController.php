<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAspirationRequest;
use App\Mail\AspirationConfirmationMail;
use App\Mail\NewAspirationNotificationMail;
use App\Models\Admin;
use App\Models\Aspiration;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AspirationController extends Controller
{
    public function store(StoreAspirationRequest $request): JsonResponse
    {
        $data = $request->validated();
        unset($data['lampiran'], $data['consent']);

        $data['nomor_tiket'] = Aspiration::generateNomorTiket();
        $data['status'] = 'Menunggu Verifikasi';
        $data['riwayat'] = [[
            'catatan' => 'Laporan diterima',
            'tanggal' => now()->translatedFormat('d M Y, H:i'),
        ]];

        if ($request->hasFile('lampiran')) {
            $data['lampiran'] = collect($request->file('lampiran'))
                ->map(fn ($file) => $file->store('aspirasi', 'public'))
                ->values()
                ->all();
        }

        $aspiration = Aspiration::create($data);

        try {
            Mail::to($aspiration->email)->send(new AspirationConfirmationMail($aspiration));
        } catch (\Throwable $e) {
            Log::warning('Gagal mengirim email konfirmasi laporan aspirasi: '.$e->getMessage());
        }

        try {
            $adminEmails = Admin::query()->pluck('email')->filter()->all();

            if (! empty($adminEmails)) {
                Mail::to($adminEmails)->send(new NewAspirationNotificationMail($aspiration));
            }
        } catch (\Throwable $e) {
            Log::warning('Gagal mengirim email notifikasi laporan aspirasi ke admin: '.$e->getMessage());
        }

        return response()->json([
            'message' => 'Laporan berhasil dikirim.',
            'nomor_tiket' => $aspiration->nomor_tiket,
        ], 201);
    }

    /**
     * Cek status laporan berdasarkan nomor tiket atau email pelapor (publik).
     */
    public function check(Request $request): JsonResponse
    {
        $query = trim((string) $request->query('query', ''));

        if ($query === '') {
            return response()->json(['message' => 'Nomor tiket atau email wajib diisi.'], 422);
        }

        $aspirations = Aspiration::query()
            ->where('nomor_tiket', $query)
            ->orWhere('email', $query)
            ->latest()
            ->get();

        if ($aspirations->isEmpty()) {
            return response()->json(['message' => 'Data laporan tidak ditemukan.'], 404);
        }

        $result = $aspirations->map(fn (Aspiration $a) => [
            'nomor_tiket' => $a->nomor_tiket,
            'judul' => $a->judul,
            'kategori' => $a->kategori,
            'kota' => $a->kota,
            'status' => $a->status,
            'tanggal' => $a->created_at->translatedFormat('d M Y'),
            'riwayat' => $a->riwayat ?? [],
        ])->values();

        return response()->json(['data' => $result]);
    }
}
