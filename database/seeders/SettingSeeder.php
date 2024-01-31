<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settingExists = Setting::where('id', 1)->exists();

        if ($settingExists) {
            return;
        }

        Setting::create([
            'app_name' => 'Laravel Mazer',
            'app_desc' => 'Lorem Ipsum Dolor Sit Amet',
            'auth_bg' => 'images/default/auth-bg.png',
        ]);
    }
}
