<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Pemakaian: ->middleware('role:super_admin')  atau  ->middleware('role:super_admin,blogger')
     * User boleh lewat bila rolenya SALAH SATU dari daftar.
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login'); // kalau belum login
        }

        if (!in_array(Auth::user()->role, $roles, true)) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
