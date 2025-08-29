@extends('layouts.admin')

@section('title', 'Contact')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8 space-y-6">

    <!-- Card Table -->
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="min-w-full text-sm text-gray-700">
            <thead class="bg-gray-100 sticky top-0">
                <tr class="text-left border-b">
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Subject</th>
                    <th class="px-4 py-3">Pesan</th>
                    <th class="px-4 py-3">Waktu</th>
                    <th class="px-4 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3">{{ $contact->name }}</td>
                    <td class="px-4 py-3">{{ $contact->email }}</td>
                    <td class="px-4 py-3">{{ $contact->subject ?? '-' }}</td>
                    <td class="px-4 py-3">{{ Str::limit($contact->message, 50) }}</td>
                    <td class="px-4 py-3">{{ $contact->created_at->format('d M Y H:i') }}</td>
                    <td class="px-4 py-3 text-right space-x-2">
                        <a href="{{ route('admin.contacts.show', $contact->id) }}" 
                           class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">View</a>
                        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus pesan ini?')" 
                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center px-4 py-6 text-gray-500">Tidak ada pesan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-between items-center text-sm text-gray-600 mt-4">
        @if($contacts->count())
        <p>Menampilkan {{ $contacts->firstItem() }} - {{ $contacts->lastItem() }} dari {{ $contacts->total() }} pesan</p>
        @else
        <p>Menampilkan 0 pesan</p>
        @endif
        <div class="flex gap-2">
            {{ $contacts->links() }}
        </div>
    </div>
</div>
@endsection
