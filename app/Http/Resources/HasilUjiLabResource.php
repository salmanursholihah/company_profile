<?php

namespace App\Http\Resources;

use App\Support\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HasilUjiLabResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'judul'     => $this->judul,
            'poin1'     => $this->poin1,
            'poin2'     => $this->poin2,
            'image_url' => Media::url($this->gambar),
        ];
    }
}
