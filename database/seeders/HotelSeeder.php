<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HotelSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('hotels')->insert([
            'name' => Str::random(20),
            'address' => Str::random(20),
            'address2' => Str::random(20),
        ]);
    }
}
