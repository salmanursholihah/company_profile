<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // ==============================
    // REGISTER
    // ==============================
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'vendor',
            'password' => Hash::make($request->password),
        ]);

        // Langsung masuk, lalu kembali ke halaman sebelumnya (mis. materi panduan) atau ke pilihan paket
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended(route('subscription.plans'))
            ->with('success', 'Pendaftaran berhasil. Silakan pilih paket langganan.');
    }

    // ==============================
    // LOGIN
    // ==============================
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard'); // nanti bisa diarahkan ke dashboard admin/vendor
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.'
        ]);
    }

    // ==============================
    // LOGOUT
    // ==============================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    // ==============================
    // EDIT PROFILE
    // ==============================
    public function editProfile()
    {
        $user = Auth::user();
        return view('auth.edit_profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:6'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile berhasil diperbarui.');
    }
}
