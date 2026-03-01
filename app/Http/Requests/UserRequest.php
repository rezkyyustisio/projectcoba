<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->id;
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $id],
            'password' => [$id ? 'nullable' : 'required', 'string', 'min:8', 'max:255', 'confirmed'],
            'description' => ['required', 'max:1000'],
            'facebook' => ['nullable', 'max:1000'],
            'x' => ['nullable', 'max:1000'],
            'instagram' => ['nullable', 'max:1000'],
            'telegram' => ['nullable', 'max:1000'],
            'linked_in' => ['nullable', 'max:1000'],
            'image' => [$id ? 'nullable' : 'required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
        ];
    }
}
