<?php

namespace App\Http\Middleware;

use App\Utils\AuthUtils;
use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateRoles
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (Auth::check() && in_array(AuthUtils::getRole(auth()->user()), $roles)) {
            return $next($request);
        }

        return redirect()
            ->back()
            ->withErrors(['message' => 'Akses tidak sah.']);
    }
}
