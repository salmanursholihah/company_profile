<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Base controller API. Semua response memakai format:
 * { "success": bool, "message": string|null, "data": ..., "meta": {...}? }
 */
abstract class ApiController extends Controller
{
    protected function ok($data = null, ?string $message = null, int $status = 200, ?array $meta = null): JsonResponse
    {
        $body = [
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ];

        if ($meta !== null) {
            $body['meta'] = $meta;
        }

        return response()->json($body, $status);
    }

    protected function fail(string $message, int $status = 400, $errors = null): JsonResponse
    {
        $body = ['success' => false, 'message' => $message];

        if ($errors !== null) {
            $body['errors'] = $errors;
        }

        return response()->json($body, $status);
    }

    /** Kirim hasil paginate() dengan meta halaman. */
    protected function paginated(LengthAwarePaginator $paginator, string $resourceClass): JsonResponse
    {
        return $this->ok(
            $resourceClass::collection($paginator->getCollection())->resolve(),
            null,
            200,
            [
                'current_page' => $paginator->currentPage(),
                'last_page'    => $paginator->lastPage(),
                'per_page'     => $paginator->perPage(),
                'total'        => $paginator->total(),
                'has_more'     => $paginator->hasMorePages(),
            ]
        );
    }

    /** per_page dari query string, dibatasi agar tidak berlebihan. */
    protected function perPage(int $default = 10, int $max = 50): int
    {
        return max(1, min((int) request()->query('per_page', $default), $max));
    }
}
