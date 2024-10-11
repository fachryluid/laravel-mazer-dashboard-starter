<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class SettingPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user): bool
    {
        return $user->isAdmin();
    }
}
