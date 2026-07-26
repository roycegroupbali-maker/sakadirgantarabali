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
            'asal_sekolah' => ['required', 'string', 'max:255'],
            'pangkalan_id' => ['nullable', 'exists:pangkalans,id'],
            'krida' => ['nullable', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:20'],
        ];
    }

    public function attributes(): array
    {
        return [
            'asal_sekolah' => 'asal sekolah/gugus depan',
            'pangkalan_id' => 'pangkalan tujuan',
            'no_hp' => 'nomor WhatsApp',
        ];
    }
}
