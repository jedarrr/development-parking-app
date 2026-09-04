<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogAktivitasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('log_aktivitas')->insert([
            [
                'id_user'         => 1,
                'aktivitas'       => 'Login ke sistem admin',
                'waktu_aktivitas' => '2026-03-30 07:45:00',
            ],
            [
                'id_user'         => 2,
                'aktivitas'       => 'Input transaksi masuk kendaraan B 1234 ABC',
                'waktu_aktivitas' => '2026-03-30 08:00:00',
            ],
        ]);
    }
}