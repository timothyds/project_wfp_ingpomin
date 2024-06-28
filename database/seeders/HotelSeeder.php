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
                'hotel_type_id' => '3',
            ],
            [
                'name' => 'Dothan Inn & Suites',
                'address' => '3285 Montgomery Hwy',
                'phone' => '1 913 6516000',
                'email' => 'info@yourdomain.com',
                'rating' => '3',
                'hotel_type_id' => '2',
            ],
            [
                'name' => 'Catalina Inn',
                'address' => '2015 McFarland Blvd',
                'phone' => '1 913 6516000',
                'email' => 'info@yourdomain.com',
                'rating' => '5',
                'hotel_type_id' => '1',
            ],
        ]);
    }
}
