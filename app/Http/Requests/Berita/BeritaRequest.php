<?php

namespace App\Http\Requests\Berita;

use Illuminate\Foundation\Http\FormRequest;

class BeritaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        $id = $this->id;
        return [
            'category_id' => ['required'],
            'name' => ['required','string','max:255'],
            'top' => ['required','boolean'],
            'highlight' => ['required','boolean'],
            'description' => ['required'],
            'tags' => ['required'],
            'image' => [$id ? 'nullable' : '','image','mimes:jpeg,png,jpg,webp','max:2048'],
            'created_at' => ['required', 'date'],
        ];
    }
}
