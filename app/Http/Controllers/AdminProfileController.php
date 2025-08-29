<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    // Tampilkan form edit profile
    public function edit()
    {
        $user = Auth::user(); // ambil user yang login
        return view('auth.edit_profile', compact('user'));
    }

    // Update profile
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:6',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // Upload avatar jika ada
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/avatars', $filename);

            // Hapus avatar lama jika ada
            if ($user->avatar) {
                \Storage::delete('public/avatars/' . $user->avatar);
            }

            $user->avatar = 'avatars/' . $filename;
        }

        $user->save();

        return redirect()->route('auth.edit_profile')->with('success', 'Profile berhasil diperbarui.');
    }
}
