<?php

namespace App\Policies;

use App\Models\BasicUser;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BasicUserPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isAdmin();
    }

    public function view(User $user, BasicUser $basicUser): bool
    {
        return $user->isAdmin();
    }

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, BasicUser $basicUser): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user, BasicUser $basicUser): bool
    {
        return $user->isAdmin();
    }

    public function restore(User $user, BasicUser $basicUser): bool
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, BasicUser $basicUser): bool
    {
        return $user->isAdmin();
    }
}
