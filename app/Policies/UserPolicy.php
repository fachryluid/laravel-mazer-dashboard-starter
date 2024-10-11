<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function updatePassword(User $user, User $model): bool
    {
        return $user->isManager() ||
            $user->isAdmin() ||
            ($model->id == $user->id);
    }

    public function reportUsers(User $user): bool
    {
        return $user->isManager();
    }
}
