<?php

namespace App\Http\Resources;

use App\Support\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'kategori'  => $this->kategori,
            'deskripsi' => $this->deskripsi,
            'price'     => $this->price,
            'discount'  => $this->discount,
            'stok'      => $this->stok,
            'lokasi'    => $this->lokasi,
            'status'    => $this->status,
            'image_url' => Media::url($this->image),
        ];
    }
}
