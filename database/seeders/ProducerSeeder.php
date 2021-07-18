<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProducerSeeder extends Seeder
{
    public function run()
    {
        
        DB::table('producers')->insert([
            'producer_name' => Str::random(10),
            'producer_image' => Str::random(10),
            'best_film' => Str::random(10),
            'award' => Str::random(10),
            'about' => Str::random(10)
            
        ]);
    }
}
