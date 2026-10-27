<?php

namespace App\Services\Fcm;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Klien FCM HTTP v1 tanpa paket tambahan (hanya ext-openssl + Http bawaan Laravel).
 * Alur: JWT (RS256) dari service account -> access token OAuth2 -> POST messages:send.
 */
class FcmClient
{
    public const OK      = 'ok';
    public const INVALID = 'invalid'; // token sudah mati -> hapus dari DB
    public const ERROR   = 'error';

    protected ?array $cred = null;

    public function enabled(): bool
    {
        return $this->credentials() !== null;
    }

    protected function credentials(): ?array
    {
        if ($this->cred !== null) {
            return $this->cred ?: null;
        }

        $path = config('firebase.credentials');
        if (! $path || ! is_file($path)) {
            $this->cred = [];
            return null;
        }

        $json = json_decode((string) file_get_contents($path), true);
        if (! is_array($json) || empty($json['private_key']) || empty($json['client_email']) || empty($json['project_id'])) {
            Log::warning('FCM: file service account tidak valid', ['path' => $path]);
            $this->cred = [];
            return null;
        }

        return $this->cred = $json;
    }

    protected function accessToken(): ?string
    {
        $c = $this->credentials();
        if (! $c) {
            return null;
        }

        $cached = Cache::get('fcm_access_token');
        if ($cached) {
            return $cached;
        }

        $now    = time();
        $header = $this->b64(json_encode(['alg' => 'RS256', 'typ' => 'JWT']));
        $claims = $this->b64(json_encode([
            'iss'   => $c['client_email'],
            'scope' => 'https://www.googleapis.com/auth/firebase.messaging',
            'aud'   => $c['token_uri'] ?? 'https://oauth2.googleapis.com/token',
            'iat'   => $now,
            'exp'   => $now + 3600,
        ]));

        $input = "$header.$claims";
        $sig   = '';
        if (! openssl_sign($input, $sig, $c['private_key'], OPENSSL_ALGO_SHA256)) {
            Log::error('FCM: gagal menandatangani JWT (cek private_key)');
            return null;
        }

        $res = Http::asForm()->timeout((int) config('firebase.timeout', 8))
            ->post($c['token_uri'] ?? 'https://oauth2.googleapis.com/token', [
                'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
                'assertion'  => $input . '.' . $this->b64($sig),
            ]);

        $token = $res->json('access_token');
        if (! $res->successful() || ! $token) {
            Log::error('FCM: gagal mengambil access token', ['status' => $res->status(), 'body' => $res->body()]);
            return null;
        }

        Cache::put('fcm_access_token', $token, 3300); // 55 menit (token hidup 60 menit)

        return $token;
    }

    /** Kirim ke satu token. Mengembalikan OK | INVALID | ERROR. */
    public function send(string $token, string $title, string $body, array $data = []): string
    {
        $c  = $this->credentials();
        $at = $this->accessToken();
        if (! $c || ! $at) {
            return self::ERROR;
        }

        // FCM mewajibkan semua nilai "data" bertipe string.
        $strData = [];
        foreach ($data as $k => $v) {
            $strData[(string) $k] = is_scalar($v) ? (string) $v : json_encode($v);
        }

        $payload = ['message' => [
            'token'        => $token,
            'notification' => ['title' => $title, 'body' => $body],
            'data'         => $strData,
            'android'      => [
                'priority'     => 'HIGH',
                'notification' => [
                    'channel_id' => config('firebase.android_channel', 'compro_default'),
                    'sound'      => 'default',
                ],
            ],
            'apns' => ['payload' => ['aps' => ['sound' => 'default']]],
        ]];

        try {
            $res = Http::withToken($at)
                ->timeout((int) config('firebase.timeout', 8))
                ->post("https://fcm.googleapis.com/v1/projects/{$c['project_id']}/messages:send", $payload);
        } catch (\Throwable $e) {
            Log::warning('FCM: koneksi gagal', ['error' => $e->getMessage()]);
            return self::ERROR;
        }

        if ($res->successful()) {
            return self::OK;
        }

        if ($res->status() === 401) {
            Cache::forget('fcm_access_token'); // kedaluwarsa -> ambil ulang pada pengiriman berikutnya
        }

        $code = collect($res->json('error.details') ?? [])->pluck('errorCode')->filter()->first()
            ?? $res->json('error.status');

        if (in_array($code, ['UNREGISTERED', 'NOT_FOUND'], true)) {
            return self::INVALID;
        }

        Log::warning('FCM: pengiriman gagal', ['status' => $res->status(), 'code' => $code, 'body' => $res->body()]);
        return self::ERROR;
    }

    protected function b64(string $s): string
    {
        return rtrim(strtr(base64_encode($s), '+/', '-_'), '=');
    }
}
