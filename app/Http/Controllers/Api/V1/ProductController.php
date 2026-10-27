<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends ApiController
{
    // GET /api/v1/products?q=&kategori=&per_page=
    public function index(): JsonResponse
    {
        $products = Product::query()
            ->when(request('q'), fn ($q, $s) => $q->where(function ($w) use ($s) {
                $w->where('name', 'like', "%{$s}%")->orWhere('deskripsi', 'like', "%{$s}%");
            }))
            ->when(request('kategori'), fn ($q, $k) => $q->where('kategori', $k))
            ->latest()
            ->paginate($this->perPage());

        return $this->paginated($products, ProductResource::class);
    }

    // GET /api/v1/products/{id}
    public function show(Product $product): JsonResponse
    {
        return $this->ok((new ProductResource($product))->resolve());
    }
}
