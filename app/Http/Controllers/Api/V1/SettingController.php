<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\SiteSetting;
use Illuminate\Http\JsonResponse;

/**
 * GET /api/v1/settings — brand, logo, palet warna, teks & bagian beranda
 * yang diatur dari Admin > Setting. Dipanggil Flutter saat aplikasi dibuka.
 */
class SettingController extends ApiController
{
    public function __invoke(): JsonResponse
    {
        return $this->ok(SiteSetting::apiPayload())
            // boleh di-cache sebentar di sisi klien/CDN; "version" menandai perubahan
            ->header('Cache-Control', 'public, max-age=60');
    }
}
