<?php

namespace App\Support;

use Illuminate\Support\Str;

/**
 * Mengubah path gambar di database menjadi URL absolut untuk aplikasi mobile.
 *
 * Project web ini menyimpan gambar dengan beberapa pola berbeda:
 *  - storage/app/public (disk "public")  -> asset('storage/...')
 *  - public/uploads/legalitas/<file>     -> hanya nama file di DB
 *  - beberapa kolom (about, halaman_utama) dirender dengan asset($path) langsung
 * Helper ini menangani semuanya supaya Flutter cukup memakai satu field URL.
 */
class Media
{
    public static function url(?string $path, ?string $legacyDir = null): ?string
    {
        if (blank($path)) {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        $path = ltrim($path, '/');

        // Pola lama: hanya nama file, disimpan di public/<legacyDir>/
        if ($legacyDir && file_exists(public_path($legacyDir . '/' . $path))) {
            return asset($legacyDir . '/' . $path);
        }

        // Path sudah relatif terhadap public/ (mis. "storage/..." atau "uploads/...")
        if (file_exists(public_path($path))) {
            return asset($path);
        }

        if (Str::startsWith($path, 'storage/')) {
            return asset($path);
        }

        // Default: file di disk "public" yang di-symlink ke public/storage
        return asset('storage/' . $path);
    }
}
