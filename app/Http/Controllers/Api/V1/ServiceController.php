<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\JsonResponse;

class ServiceController extends ApiController
{
    // GET /api/v1/services
    public function index(): JsonResponse
    {
        return $this->ok(ServiceResource::collection(Service::all())->resolve());
    }
}
