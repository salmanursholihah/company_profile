@extends('layouts.auth')

@section('title', 'Edit Profile')

@section('content')
<form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')
    <div>
        <label class="block text-gray-700">Nama</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded px-3 py-2" required>
        @error('name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
    </div>
    <div>
        <label class="block text-gray-700">Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded px-3 py-2" required>
        @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
    </div>
    <div>
        <label class="block text-gray-700">Password Baru (kosongkan jika tidak ingin ganti)</label>
        <input type="password" name="password" class="w-full border rounded px-3 py-2">
        @error('password')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
    </div>
    <div>
        <label class="block text-gray-700">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2">
    </div>
    <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Update Profile</button>
</form>
<form action="{{ route('logout') }}" method="POST" class="mt-4">
    @csrf
    <button type="submit" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700">Logout</button>
</form>

@endsection







