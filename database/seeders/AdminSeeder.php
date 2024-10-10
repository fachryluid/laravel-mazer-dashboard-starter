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
        $users = [
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'gender' => UserGender::MALE,
                'birthday' => '2002-10-08',
                'phone' => '0812-3456-7890',
                'password' => Hash::make('admin')
            ]
        ];

        foreach ($users as $user) {
            $adminExists = User::where('username', $user['username'])->exists();

            if (!$adminExists) {
                $user = User::create($user);

                Admin::create([
                    'user_id' => $user->id
                ]);
            }
        }
    }
}
