<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\AboutResource;
use App\Http\Resources\HasilUjiLabResource;
use App\Http\Resources\ImageResource;
use App\Http\Resources\LegalitasResource;
use App\Http\Resources\VisiMisiResource;
use App\Models\About;
use App\Models\HasilUjiLab;
use App\Models\Image;
use App\Models\Legalitas;
use App\Models\VisiMisi;
use Illuminate\Http\JsonResponse;

/** GET /api/v1/about — setara AboutController@index versi web. */
class AboutController extends ApiController
{
    public function __invoke(): JsonResponse
    {
        $activeImages = fn (string $type) => Image::where('type', $type)
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        $hasilUji = HasilUjiLab::first();

        return $this->ok([
            'abouts'            => AboutResource::collection(About::all())->resolve(),
            'visi'              => ($v = VisiMisi::where('type', 'visi')->first())
                ? (new VisiMisiResource($v))->resolve()
                : null,
            'misi'              => VisiMisiResource::collection(VisiMisi::where('type', 'misi')->get())->resolve(),
            // Seperti web: record id = 4, atau deskripsi pertama yang terisi bila record itu tidak ada
            'legalitas_deskripsi' => (Legalitas::find(4)
                ?? Legalitas::whereNotNull('deskripsi')->where('deskripsi', '!=', '')->orderBy('urutan')->first())?->deskripsi,
            'legalitas'         => LegalitasResource::collection(Legalitas::orderBy('urutan')->get())->resolve(),
            'hasil_uji_lab'     => $hasilUji ? (new HasilUjiLabResource($hasilUji))->resolve() : null,
            'client_logos'      => ImageResource::collection($activeImages('client_logo'))->resolve(),
            'about_images'      => ImageResource::collection($activeImages('about_image'))->resolve(),
        ]);
    }
}
