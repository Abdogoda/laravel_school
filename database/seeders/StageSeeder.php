<?php

namespace Database\Seeders;

use App\Models\Stage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StageSeeder extends Seeder{

    public function run(): void{
        DB::table('stages')->delete();
        $stages =  [
            [
                'name' => [
                    'en'=> 'Primary Stage',
                    'ar'=> 'المرحلة الابتدائية'
                ],
                'notes' => 'this stage is the first stage in this school, which is necessary for students applying to be at least 7 years old.'
            ],
            [
                'name' => [
                    'en'=> 'Middle Stage',
                    'ar'=> 'المرحلة الاعدادية'
                ],
                'notes' => 'this stage is the middle stage in this school, which is necessary for students applying to be at least 12 years old.'
            ],
            [
                'name' => [
                    'en'=> 'Secondary Stage',
                    'ar'=> 'المرحلة الثانوية'
                ],
                'notes' => 'this stage is the final stage in this school, which is necessary for students applying to be at least 15 years old.'
            ],
        ];
        foreach ($stages as $stage) {
            Stage::create([
                'name' => $stage['name'],
                'notes' => $stage['notes']
            ]);
        }
    }
}