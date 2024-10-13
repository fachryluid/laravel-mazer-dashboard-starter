<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class AuthService
{
  public function isWeakPassword(string $password): bool
  {
    $weakPasswords = json_decode(File::get(public_path('jsons/weak-passwords.json')), true);

    return in_array($password, $weakPasswords);
  }
}
