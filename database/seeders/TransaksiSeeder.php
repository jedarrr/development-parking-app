<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('transaksi')->insert([
            [
                'id_kendaraan' => 1,
                'waktu_masuk'  => '2026-03-30 08:00:00',
                'waktu_keluar' => '2026-03-30 11:00:00',
                'id_tarif'     => 2, // Tarif Mobil (5000)
                'durasi_jam'   => 3,
                'biaya_total'  => 15000,
                'status'       => 'keluar',
                'id_user'      => 2,
                'id_area'      => 1,
            ],
            [
                'id_kendaraan' => 2,
                'waktu_masuk'  => '2026-03-30 10:00:00',
                'waktu_keluar' => null,
                'id_tarif'     => 1, // Tarif Motor (2000)
                'durasi_jam'   => null,
                'biaya_total'  => null,
                'status'       => 'masuk',
                'id_user'      => 2,
                'id_area'      => 2,
            ],
        ]);
    }
}