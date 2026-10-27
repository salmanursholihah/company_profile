<?php

namespace App\Http\Resources;

use App\Support\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** Slide hero halaman utama (tabel halaman_utamas) */
class HeroResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'headline'     => $this->headline,
            'sub_headline' => $this->sub_headline,
            'url'          => $this->url,
            'image_url'    => Media::url($this->image),
        ];
    }
}
