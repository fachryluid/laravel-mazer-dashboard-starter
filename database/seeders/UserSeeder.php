<?php

namespace Database\Seeders;

use App\Constants\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminExists = User::where('username', 'admin')->exists();

        if ($adminExists) {
            return;
        }

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'role' => UserRole::ADMIN,
            'password' => Hash::make('admin'),
            'avatar' => 'images/default/profile-1.jpg'
        ]);
    }
}
