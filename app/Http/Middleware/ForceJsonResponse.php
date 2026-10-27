<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Memastikan semua request ke /api diperlakukan sebagai JSON,
 * sehingga error validasi/auth/404 selalu JSON (bukan redirect ke /login).
 */
class ForceJsonResponse
{
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');

        return $next($request);
    }
}
