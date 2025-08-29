<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminContactController extends Controller
{
    // Tampilkan semua pesan contact
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    // Tampilkan detail pesan
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.show', compact('contact'));
    }

    // Hapus pesan
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Message deleted successfully!');
    }
}
