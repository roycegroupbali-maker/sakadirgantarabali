<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryRequest extends FormRequest
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
            'judul' => ['required', 'string', 'max:255'],
            'foto' => ['required', 'file', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'deskripsi' => ['nullable', 'string'],
            'tanggal' => ['required', 'date'],
        ];
    }

    public function attributes(): array
    {
        return [
            'judul' => 'judul foto',
            'foto' => 'foto',
            'deskripsi' => 'deskripsi',
            'tanggal' => 'tanggal',
        ];
    }

    public function messages(): array
    {
        return [
            'foto.mimes' => 'Foto harus berformat jpg, jpeg, png, atau webp.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ];
    }
}
