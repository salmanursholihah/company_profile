<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends ApiController
{
    // POST /api/v1/contact
    public function store(Request $request): JsonResponse
    {
        // Kolom contacts.message & subject di migration adalah varchar(255),
        // jadi batas yang sama dipakai di sini agar tidak error di database.
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:255',
        ]);

        // Kolom subject NOT NULL di database, sedangkan form web mengizinkan kosong.
        $data['subject'] = $data['subject'] ?? '(Tanpa subjek)';

        Contact::create($data);

        return $this->ok(null, 'Pesan Anda berhasil dikirim!', 201);
    }
}
