<?php

namespace App\Constants;

use ReflectionClass;
use Illuminate\Support\Collection;

class UserGender
{
  // NOTE:
  // There are only 2 genders

  public const MALE = 'Laki-laki';
  public const FEMALE = 'Perempuan';

  public static function all(): Collection
  {
    $class = new ReflectionClass(__CLASS__);
    return collect($class->getConstants());
  }
}
