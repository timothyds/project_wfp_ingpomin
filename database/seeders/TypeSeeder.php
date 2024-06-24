<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('types')->insert([
            ['name'=>'Inn'],
            ['name'=>'Resort'],
            ['name'=>'Hotel'],
            ['name'=>'Hostel'],
            ['name'=>'Apartment']
        ]);
    }
}
