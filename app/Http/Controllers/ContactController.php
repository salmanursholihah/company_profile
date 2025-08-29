<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Tampilkan form contact (public)
    public function index()
    {
        return view('contact'); // view contact untuk user/public
    }

    // Simpan pesan dari form
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        return back()->with('success', 'Pesan Anda berhasil dikirim!');
    }
}
