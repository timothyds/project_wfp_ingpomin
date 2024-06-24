<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'Room Alpha', 'product_type_id' => 5, 'hotel_id' => 1, 'price' => 500000],
            ['name' => 'Room Beta', 'product_type_id' => 6, 'hotel_id' => 2, 'price' => 1000000],
            ['name' => 'Room Charlie', 'product_type_id' => 7, 'hotel_id' => 3, 'price' => 15000000],
        ]);
    }
}
