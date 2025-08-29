@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Message Detail</h1>

<div class="bg-white p-6 rounded shadow">
    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Subject:</strong> {{ $contact->subject ?? '-' }}</p>
    <p><strong>Message:</strong></p>
    <p class="border p-2 rounded bg-gray-50">{{ $contact->message }}</p>

    <a href="{{ route('admin.contacts.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">Back to list</a>
</div>
@endsection
