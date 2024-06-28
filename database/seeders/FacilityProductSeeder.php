<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FacilityProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('facility_product')->insert([
            [
                'facility_id' => '1',
                'product_id' => '1',
            ],
            [
                'facility_id' => '2',
                'product_id' => '3',
            ],
            [
                'facility_id' => '3',
                'product_id' => '1',
            ],
            [
                'facility_id' => '1',
                'product_id' => '2',
            ],
            [
                'facility_id' => '3',
                'product_id' => '2',
            ],
        ]);
    }
}
