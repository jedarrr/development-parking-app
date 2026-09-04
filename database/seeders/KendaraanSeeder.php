<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KendaraanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kendaraan')->insert([
            [
                'plat_nomor'      => 'B 1234 ABC',
                'jenis_kendaraan' => 'mobil',
                'warna'           => 'Hitam',
                'pemilik'         => 'Budi Santoso',
                'id_user'         => 2, // Merujuk ke id_user petugas
            ],
            [
                'plat_nomor'      => 'D 5678 XYZ',
                'jenis_kendaraan' => 'motor',
                'warna'           => 'Merah',
                'pemilik'         => 'Siti Aminah',
                'id_user'         => 2,
            ],
            [
                'plat_nomor'      => 'KT 6767 RPL',
                'jenis_kendaraan' => 'Lainnya',
                'warna'           => 'Biru',
                'pemilik'         => 'Arfan',
                'id_user'         => 2,
            ],
        ]);
    }
}