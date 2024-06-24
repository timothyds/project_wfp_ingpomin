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
            [
                'name' => 'On The Beach',
                'address' => '337 E Beach Blvd',
                'phone' => '1 913 6516000',
                'email' => 'info@yourdomain.com',
                'rating' => '4',
                'type_id' => '3',
            ],
        ]);
    }
}
