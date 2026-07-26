<?php

namespace App\Http\Requests\Admin;

use App\Models\Aspiration;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAspirationRequest extends FormRequest
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
            'status' => ['required', Rule::in(Aspiration::STATUS_OPTIONS)],
            'catatan' => ['nullable', 'string'],
        ];
    }
}
