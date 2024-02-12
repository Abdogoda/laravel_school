<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder{
    public function run(): void{
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Abdo Goda',
            'email' => 'abdogoda0a@gmail.com',
            'password' => Hash::make('123456789')
        ]);

        $this->call(BloodSeeder::class);
        $this->call(ReligionSeeder::class);
        $this->call(NationalitySeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(RelationshipSeeder::class);
        $this->call(SpecializationSeeder::class);
        $this->call(StageSeeder::class);
        $this->call(SettingSeeder::class);
    }
}