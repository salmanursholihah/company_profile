<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\FooterResource;
use App\Http\Resources\ImageResource;
use App\Models\Footer;
use App\Models\Image;
use Illuminate\Http\JsonResponse;

class FooterController extends ApiController
{
    // GET /api/v1/footer — info kontak perusahaan, tautan sosial, logo mitra
    public function __invoke(): JsonResponse
    {
        $footer = Footer::first();

        return $this->ok([
            'footer' => $footer ? (new FooterResource($footer))->resolve() : null,
            'logos'  => ImageResource::collection(Image::where('type', 'footer_logo')->get())->resolve(),
        ]);
    }
}
