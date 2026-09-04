<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama_lengkap' => 'Administrator',
                'username'     => 'admin',
                'password'     => Hash::make('admin123'),
                'role'         => 'admin',
                'status_aktif' => true,
            ],
            [
                'nama_lengkap' => 'Petugas Parkir',
                'username'     => 'petugas',
                'password'     => Hash::make('petugas123'),
                'role'         => 'petugas',
                'status_aktif' => true,
            ],
            [
                'nama_lengkap' => 'Owner',
                'username'     => 'owner',
                'password'     => Hash::make('owner123'),
                'role'         => 'owner',
                'status_aktif' => true,
            ]
        ]);
    }
}