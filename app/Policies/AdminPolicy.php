<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AdminPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isManager();
    }

    public function view(User $user, Admin $admin): bool
    {
        return $user->isManager();
    }

    public function create(User $user): bool
    {
        return $user->isManager();
    }

    public function update(User $user, Admin $admin): bool
    {
        return $user->isManager();
    }

    public function delete(User $user, Admin $admin): bool
    {
        return $user->isManager();
    }

    public function restore(User $user, Admin $admin): bool
    {
        return $user->isManager();
    }

    public function forceDelete(User $user, Admin $admin): bool
    {
        return $user->isManager();
    }
}
