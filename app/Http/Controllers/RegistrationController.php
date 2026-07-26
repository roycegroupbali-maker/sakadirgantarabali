<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistrationRequest;
use App\Mail\RegistrationConfirmationMail;
use App\Models\Registration;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function store(StoreRegistrationRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['kode_pendaftaran'] = Registration::generateKodePendaftaran();
        $data['status'] = 'Menunggu Verifikasi';

        $registration = Registration::create($data);
        $registration->load('pangkalan');

        try {
            Mail::to($registration->email)->send(new RegistrationConfirmationMail($registration));
        } catch (\Throwable $e) {
            Log::warning('Gagal mengirim email konfirmasi pendaftaran: '.$e->getMessage());
        }

        return response()->json([
            'message' => 'Pendaftaran berhasil dikirim.',
            'kode_pendaftaran' => $registration->kode_pendaftaran,
        ], 201);
    }
}
