<?php

namespace Database\Seeders;

use App\Constants\UserGender;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ManagerSeeder extends Seeder
{
    public function run(): void
    {
        $dataExists = User::where('username', 'manager')->exists();

        if ($dataExists) {
            return;
        }

        $user = User::create([
            'name' => 'Manager',
            'username' => 'manager',
            'email' => 'manager@gmail.com',
            'gender' => UserGender::MALE,
            'birthday' => '2002-10-08',
            'phone' => '081234567891',
            'password' => Hash::make('manager')
        ]);

        Manager::create([
            'user_id' => $user->id
        ]);
    }
}
