<?php

namespace App\Http\Resources;

use App\Support\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LegalitasResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'judul'     => $this->judul,
            'deskripsi' => $this->deskripsi,
            'urutan'    => $this->urutan,
            // gambar legalitas disimpan sebagai nama file di public/uploads/legalitas
            'image_url' => Media::url($this->image, 'uploads/legalitas'),
        ];
    }
}
