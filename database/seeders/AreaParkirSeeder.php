<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaParkirSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('area_parkir')->insert([
            ['nama_area' => 'A1', 'kapasitas' => 50, 'terisi' => 0],
            ['nama_area' => 'A2', 'kapasitas' => 50, 'terisi' => 0],
            ['nama_area' => 'B1', 'kapasitas' => 20, 'terisi' => 0],
            ['nama_area' => 'B2', 'kapasitas' => 20, 'terisi' => 0],
        ]);
    }
}