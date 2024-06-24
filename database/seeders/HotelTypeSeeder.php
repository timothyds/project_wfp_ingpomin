<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class HotelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotel_types')->insert([
            ['name' => 'City hotel'],
            ['name' => 'Residential Hotel'],
            ['name' => 'Motel'],
        ]);
    }
}
