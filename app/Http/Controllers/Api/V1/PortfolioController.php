<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\PortfolioResource;
use App\Models\Portfolio;
use Illuminate\Http\JsonResponse;

class PortfolioController extends ApiController
{
    // GET /api/v1/portfolios?category=
    public function index(): JsonResponse
    {
        $items = Portfolio::query()
            ->when(request('category'), fn ($q, $c) => $q->where('category', $c))
            ->latest()
            ->get();

        return $this->ok(
            PortfolioResource::collection($items)->resolve(),
            null,
            200,
            ['categories' => Portfolio::query()->distinct()->pluck('category')->filter()->values()]
        );
    }
}
