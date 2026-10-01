<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FooterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_name' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email',

            'useful_links' => 'nullable|string',
            'our_services' => 'nullable|string',
            'social_links' => 'nullable|string',
            'whatsapp' => 'nullable|string|max:30',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',

            'tagline' => 'nullable|string|max:255',
            'copyright' => 'nullable|string|max:255',
        ];
    }
}
