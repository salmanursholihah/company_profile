@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<form action="{{ route('login') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block text-gray-700">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2" required>
        @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
    </div>
    <div>
        <label class="block text-gray-700">Password</label>
        <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
        @error('password')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
    </div>
    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Login</button>
    <p class="text-center text-sm text-gray-500 mt-2">
        Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600">Register</a>
    </p>
</form>
@endsection
