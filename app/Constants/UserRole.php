<?php

namespace App\Constants;

use ReflectionClass;
use Illuminate\Support\Collection;

class UserRole
{
  public const USER = 'USER';
  public const ADMIN = 'ADMIN';
  public const MANAGER = 'MANAGER';

  public static function all(): Collection
  {
    $class = new ReflectionClass(__CLASS__);
    return collect($class->getConstants());
  }
}
