<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\CatalogResource;
use App\Models\Katalog;
use Illuminate\Http\JsonResponse;

/** E-katalog: setara KatalogController (halaman publik) versi web. */
class CatalogController extends ApiController
{
    // GET /api/v1/catalogs?q=&company=&kategori=&per_page=&page=
    public function index(): JsonResponse
    {
        $catalogs = Katalog::query()
            ->when(request('q'), function ($q, $s) {
                $q->where(function ($w) use ($s) {
                    $w->where('name', 'like', "%{$s}%")
                        ->orWhere('brand', 'like', "%{$s}%")
                        ->orWhere('kode_produk', 'like', "%{$s}%")
                        ->orWhere('company', 'like', "%{$s}%")
                        ->orWhere('kategori', 'like', "%{$s}%");
                });
            })
            ->when(request('company'), fn ($q, $c) => $q->where('company', $c))
            ->when(request('kategori'), fn ($q, $k) => $q->where('kategori', $k))
            ->orderBy('id')
            ->paginate($this->perPage());

        return $this->paginated($catalogs, CatalogResource::class);
    }

    // GET /api/v1/catalogs/companies  — untuk filter chip/dropdown
    public function companies(): JsonResponse
    {
        return $this->ok(
            Katalog::query()->whereNotNull('company')->distinct()->orderBy('company')->pluck('company')->values()
        );
    }

    // GET /api/v1/catalogs/{katalog}
    public function show(Katalog $katalog): JsonResponse
    {
        return $this->ok((new CatalogResource($katalog))->resolve());
    }
}
