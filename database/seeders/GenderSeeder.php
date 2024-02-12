<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder{
    
    public function run(): void{
        DB::table('genders')->delete();
        $genders =  [
            [
                'en'=> 'Male',
                'ar'=> 'ذكر'
            ],
            [
                'en'=> 'Female',
                'ar'=> 'أنثي'
            ],
        ];
        foreach ($genders as $gender) {
            Gender::create(['title' => $gender]);
        }
    }
}