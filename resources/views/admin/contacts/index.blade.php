@extends('layouts.admin')

@section('content')
<h1 style="font-weight: bold;">Pesan Masuk</h1>
<br>
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10" width="100%">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Waktu</th>
        <th>Aksi</th>
    </tr>
    @foreach ($contacts as $contact)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->subject }}</td>
            <td>{{ $contact->message }}</td>
            <td>{{ $contact->created_at->format('d-m-Y H:i') }}</td>
            <td>
                <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus pesan ini?')">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

{{ $contacts->links() }}
@endsection
