<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 200; $i++) {
            $name = $faker->sentence($nbWords = 3, $variableNbWords = true);
            $username = $faker->userName;
            $password = Hash::make($username);

            User::create([
                'name' => $name,
                'username' => $username,
                'password' => $password,
            ]);
        }
    }
}
