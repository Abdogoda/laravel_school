<?php

namespace Database\Seeders;

use App\Models\Relationship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelationshipSeeder extends Seeder{
    
    public function run(): void{
        DB::table('relationships')->delete();
        $relationships =  [
            [
                'en'=> 'Father',
                'ar'=> 'أب'
            ],
            [
                'en'=> 'Mother',
                'ar'=> 'أم'
            ],
            [
                'en'=> 'Brother',
                'ar'=> 'أخ'
            ],
            [
                'en'=> 'Sister',
                'ar'=> 'أخت'
            ],
            [
                'en'=> 'Other',
                'ar'=> 'غيرذلك'
            ],
        ];
        foreach ($relationships as $relationship) {
            Relationship::create(['title' => $relationship]);
        }
    }
}