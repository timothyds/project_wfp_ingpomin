<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('facilities')->insert([
            [
                'name' => 'AC',
                'description' => 'Air Conditioner',
            ],
            [
                'name' => 'Fan',
                'description' => 'Air Fan',
            ],
            [
                'name' => 'Wi-Fi',
                'description' => 'Wi-Fi network',
            ],
        ]);
    }
}
