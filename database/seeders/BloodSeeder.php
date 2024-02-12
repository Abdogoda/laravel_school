<?php

namespace Database\Seeders;

use App\Models\Blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodSeeder extends Seeder{

    public function run(): void{
        DB::table('bloods')->delete();
        $bloods = ['O-', 'O+', 'A-', 'A+', 'B-', 'B+', 'AB-', 'AB+'];
        foreach ($bloods as $blood) {
            Blood::create(['name' => $blood]);
        }
    }
}