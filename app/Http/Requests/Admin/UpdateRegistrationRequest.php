<?php

namespace App\Http\Requests\Admin;

use App\Models\Registration;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRegistrationRequest extends FormRequest
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
            'status' => ['required', Rule::in(Registration::STATUS_OPTIONS)],
            'catatan_admin' => ['nullable', 'string'],
        ];
    }
}
