<?php

namespace App\Http\Requests\Berita;

use Illuminate\Foundation\Http\FormRequest;

class BeritaTagRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required','string','max:255'],
        ];
    }
}