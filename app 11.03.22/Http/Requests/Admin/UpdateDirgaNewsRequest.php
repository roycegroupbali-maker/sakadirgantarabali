<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDirgaNewsRequest extends FormRequest
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
            'thumbnail' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'isi' => ['required', 'string'],
            'penulis' => ['required', 'string', 'max:255'],
            'tanggal_publish' => ['required', 'date'],
            'status' => ['required', 'in:draft,publish'],
        ];
    }

    public function attributes(): array
    {
        return [
            'judul' => 'judul berita',
            'thumbnail' => 'gambar thumbnail',
            'isi' => 'isi berita',
            'penulis' => 'penulis',
            'tanggal_publish' => 'tanggal publish',
            'status' => 'status',
        ];
    }

    public function messages(): array
    {
        return [
            'thumbnail.mimes' => 'Thumbnail harus berformat jpg, jpeg, png, atau webp.',
            'thumbnail.max' => 'Ukuran thumbnail maksimal 2MB.',
        ];
    }
}
