<?php

namespace App\Http\Resources;

use App\Support\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** E-katalog (tabel katalogs). Field detail hanya muncul di endpoint show. */
class CatalogResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $detail = (bool) $request->route('katalog');

        return [
            'id'           => $this->id,
            'name'         => $this->name,
            'company'      => $this->company,
            'kategori'     => $this->kategori,
            'brand'        => $this->brand,
            'preview_desc' => $this->preview_desc,
            'image_url'    => Media::url($this->image),
            $this->mergeWhen($detail, [
                'kode_produk'  => $this->kode_produk,
                'model_produk' => $this->model_produk,
                'seri_produk'  => $this->seri_produk,
                'deskripsi'    => $this->deskripsi,
                'spesifikasi'  => $this->spesifikasi,
            ]),
        ];
    }
}
