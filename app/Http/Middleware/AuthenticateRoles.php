<?php

namespace App\Http\Middleware;

use App\Constants\UserRole;
use App\Utils\AuthUtils;
use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateRoles
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('auth.login.index');
        }

        $user = Auth::user();

        if ($this->checkUserRole($user, $roles)) {
            return $next($request);
        }

        abort(403, 'Akses tidak sah');
    }

    private function checkUserRole($user, array $roles): bool
    {
        foreach ($roles as $role) {
            if (($role === UserRole::ADMIN && $user->isAdmin()) ||
                ($role === UserRole::MANAGER && $user->isManager()) ||
                ($role === UserRole::USER && $user->isBasicUser())
            ) {
                return true;
            }
        }

        return false;
    }
}
