<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends ApiController
{
    // POST /api/v1/auth/register — pelanggan umum (role "user")
    public function register(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255|unique:users,email',
            'password'    => 'required|string|min:6|confirmed',
            'device_name' => 'nullable|string|max:100',
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => $data['password'], // di-hash oleh cast
            'role'     => 'user',
            'status'   => 'aktif',
        ]);

        $token = $user->createToken($data['device_name'] ?? 'mobile')->plainTextToken;

        return $this->ok([
            'token'      => $token,
            'token_type' => 'Bearer',
            'user'       => (new UserResource($user))->resolve(),
        ], 'Pendaftaran berhasil.', 201);
    }

    // POST /api/v1/auth/login
    public function login(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email'       => 'required|email',
            'password'    => 'required',
            'device_name' => 'nullable|string|max:100',
        ]);

        $user = User::where('email', $data['email'])->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            return $this->fail('Email atau password salah.', 401);
        }

        if (($user->status ?? 'aktif') === 'nonaktif') {
            return $this->fail('Akun Anda dinonaktifkan. Hubungi administrator.', 403);
        }

        $token = $user->createToken($data['device_name'] ?? 'mobile')->plainTextToken;

        return $this->ok([
            'token'      => $token,
            'token_type' => 'Bearer',
            'user'       => (new UserResource($user))->resolve(),
        ], 'Login berhasil.');
    }

    // POST /api/v1/auth/logout  (Bearer token)
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return $this->ok(null, 'Logout berhasil.');
    }

    // GET /api/v1/auth/me  (Bearer token)
    public function me(Request $request): JsonResponse
    {
        return $this->ok((new UserResource($request->user()))->resolve());
    }

    // PUT /api/v1/auth/profile  (Bearer token) — setara AuthController@updateProfile web
    public function updateProfile(Request $request): JsonResponse
    {
        $user = $request->user();

        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:6',
        ]);

        $user->name  = $data['name'];
        $user->email = $data['email'];

        if (! empty($data['password'])) {
            $user->password = $data['password']; // di-hash otomatis oleh cast 'hashed'
        }

        $user->save();

        return $this->ok((new UserResource($user))->resolve(), 'Profil berhasil diperbarui.');
    }
}
