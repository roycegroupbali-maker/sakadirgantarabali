<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAspirationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'no_hp' => ['required', 'string', 'max:20'],
            'instansi' => ['nullable', 'string', 'max:255'],
            'kota' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'string', 'max:255'],
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'lokasi_kejadian' => ['required', 'string', 'max:255'],
            'tanggal_kejadian' => ['required', 'date'],
            'jam_kejadian' => ['nullable', 'string', 'max:20'],
            'kerahasiaan' => ['required', 'in:Publik,Rahasia,Anonim'],
            'lampiran' => ['nullable', 'array', 'max:5'],
            'lampiran.*' => ['file', 'mimes:jpg,jpeg,png,pdf,mp4', 'max:10240'],
            'consent' => ['accepted'],
        ];
    }

    public function attributes(): array
    {
        return [
            'no_hp' => 'nomor WhatsApp',
            'lokasi_kejadian' => 'lokasi kejadian',
            'tanggal_kejadian' => 'tanggal kejadian',
            'jam_kejadian' => 'jam kejadian',
        ];
    }

    public function messages(): array
    {
        return [
            'lampiran.*.mimes' => 'File pendukung harus berformat JPG, PNG, PDF, atau MP4.',
            'lampiran.*.max' => 'Ukuran setiap file pendukung maksimal 10MB.',
            'consent.accepted' => 'Anda harus menyatakan bahwa informasi yang diberikan benar.',
        ];
    }
}
