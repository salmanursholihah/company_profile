<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LegalitasRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'urutan'    => 'nullable|integer',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }
}
