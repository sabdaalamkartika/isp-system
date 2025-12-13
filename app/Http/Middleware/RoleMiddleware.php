<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, \Closure $next, $roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // normalize: hilangkan spasi
        $roles = str_replace(' ', '', $roles);

        // pecah berdasarkan koma atau pipe
        $allowedRoles = preg_split('/[|,]/', $roles);

        // cek apakah role user ada di array
        if (!in_array(Auth::user()->role, $allowedRoles)) {
            return abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
