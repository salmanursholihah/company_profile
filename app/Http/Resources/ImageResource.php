<?php

namespace App\Http\Resources;

use App\Support\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** Galeri gambar (tabel images): footer_logo, client_logo, about_image */
class ImageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'title'      => $this->title,
            'type'       => $this->type,
            'sort_order' => $this->sort_order,
            'image_url'  => Media::url($this->image_path),
        ];
    }
}
