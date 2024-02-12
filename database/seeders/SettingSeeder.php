<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder{

    public function run(): void{
        DB::table('settings')->delete();
        $settings =  [
            ['key' => 'current_session', 'value' => '2024-2025'],
            ['key' => 'school_title', 'value' => 'AG'],
            ['key' => 'school_name', 'value' => 'Abdo Goda International School'],
            ['key' => 'end_first_term', 'value' => '1-6-2023'],
            ['key' => 'end_second_term', 'value' => '20-1-2025'],
            ['key' => 'phone', 'value' => '01234567890'],
            ['key' => 'address', 'value' => 'Elsalam Cairo Egypt'],
            ['key' => 'email', 'value' => 'abdogoda0a@gmail.com'],
            ['key' => 'logo', 'value' => 'logo.png'],
        ];
        DB::table('settings')->insert($settings);
    }
}