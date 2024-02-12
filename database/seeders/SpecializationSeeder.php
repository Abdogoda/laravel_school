<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder{
    
    public function run(): void{
        DB::table('specializations')->delete();
        $specializations =  [
            [
                'en'=> 'Arabic',
                'ar'=> 'العربية'
            ],
            [
                'en'=> 'English',
                'ar'=> 'الانجليزية'
            ],
            [
                'en'=> 'Germany',
                'ar'=> 'الالمانية'
            ],
            [
                'en'=> 'French',
                'ar'=> 'الفرنسية'
            ],
            [
                'en'=> 'Sciences',
                'ar'=> 'علوم'
            ],
            [
                'en'=> 'Math',
                'ar'=> 'الرياضيات'
            ],
            [
                'en'=> 'History',
                'ar'=> 'تاريخ'
            ],
            [
                'en'=> 'Computer',
                'ar'=> 'حاسب الي'
            ],
            [
                'en'=> 'Sports',
                'ar'=> 'الرياضة'
            ],
        ];
        foreach ($specializations as $specialization) {
            Specialization::create(['title' => $specialization]);
        }
    }
}