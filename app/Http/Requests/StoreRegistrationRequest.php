<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistrationRequest extends FormRequest
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
            'pangkalan_nama' => ['required', 'string', 'max:255'],
            'krida' => ['nullable', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:20'],
        ];
    }

    public function attributes(): array
    {
        return [
            'pangkalan_nama' => 'pangkalan/asal sekolah',
            'no_hp' => 'nomor WhatsApp',
        ];
    }
}
