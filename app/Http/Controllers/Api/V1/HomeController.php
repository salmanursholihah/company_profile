<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\AboutResource;
use App\Http\Resources\CatalogResource;
use App\Http\Resources\FooterResource;
use App\Http\Resources\HeroResource;
use App\Http\Resources\ImageResource;
use App\Http\Resources\LegalitasResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\VisiMisiResource;
use App\Models\About;
use App\Models\Footer;
use App\Models\HalamanUtama;
use App\Models\Image;
use App\Models\Katalog;
use App\Models\Legalitas;
use App\Models\Service;
use App\Models\VisiMisi;
use Illuminate\Http\JsonResponse;

/**
 * GET /api/v1/home — satu request untuk seluruh isi halaman utama
 * (setara LandingController@index versi web).
 */
class HomeController extends ApiController
{
    public function __invoke(): JsonResponse
    {
        $about = About::first();

        return $this->ok([
            'hero'              => HeroResource::collection(HalamanUtama::orderBy('id')->get())->resolve(),
            'about'             => $about ? (new AboutResource($about))->resolve() : null,
            'visi'              => ($v = VisiMisi::where('type', 'visi')->first())
                ? (new VisiMisiResource($v))->resolve()
                : null,
            'misi'              => VisiMisiResource::collection(VisiMisi::where('type', 'misi')->get())->resolve(),
            'services'          => ServiceResource::collection(Service::all())->resolve(),
            'featured_catalogs' => CatalogResource::collection(Katalog::orderBy('id')->take(4)->get())->resolve(),
            'legalitas'         => LegalitasResource::collection(Legalitas::orderBy('urutan')->get())->resolve(),
            'footer'            => ($f = Footer::first()) ? (new FooterResource($f))->resolve() : null,
            'footer_logos'      => ImageResource::collection(Image::where('type', 'footer_logo')->get())->resolve(),
        ]);
    }
}
