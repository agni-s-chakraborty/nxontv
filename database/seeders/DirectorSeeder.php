<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DirectorSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('directors')->insert([
            'director_name' => Str::random(10),
            'director_image' => Str::random(10),
            'best_film' => Str::random(10),
            'award' => Str::random(10),
            'about' => Str::random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            
        ]);
    }
}
