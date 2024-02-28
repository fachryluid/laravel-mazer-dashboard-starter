<?php

namespace Database\Seeders;

use App\Constants\UserGender;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $adminExists = User::where('username', 'admin')->exists();

        if ($adminExists) {
            return;
        }

        $user = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'gender' => UserGender::MALE,
            'birthday' => '2002-10-08',
            'phone' => '081234567890',
            'password' => Hash::make('admin')
        ]);

        Admin::create([
            'user_id' => $user->id
        ]);
    }
}