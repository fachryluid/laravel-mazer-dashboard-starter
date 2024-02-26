<?php

namespace App\Utils;

use App\Constants\UserRole;

class AuthUtils
{
    public static function getRole($user)
    {
        if ($user->admin) {
          $role = UserRole::ADMIN;
        }

        if ($user->manager) {
          $role = UserRole::MANAGER;
        }

        return $role ?? UserRole::USER;
    }
}
