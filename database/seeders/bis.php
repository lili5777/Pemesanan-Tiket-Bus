<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class bis extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bis = [
            [
                'id_bis' => 1,
                'id_jadwal' => 1,
                'kelas' => 'EKONOMI',
                'harga' => 70000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bis' => 2,
                'id_jadwal' => 1,
                'kelas' => 'EKLUSIF',
                'harga' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bis' => 3,
                'id_jadwal' => 2,
                'kelas' => 'EKONOMI',
                'harga' => 50000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bis' => 4,
                'id_jadwal' => 2,
                'kelas' => 'EKLUSIF',
                'harga' => 70000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bis' => 5,
                'id_jadwal' => 3,
                'kelas' => 'EKONOMI',
                'harga' => 60000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bis' => 6,
                'id_jadwal' => 3,
                'kelas' => 'EKLUSIF',
                'harga' => 80000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bis' => 7,
                'id_jadwal' => 4,
                'kelas' => 'EKONOMI',
                'harga' => 70000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bis' => 8,
                'id_jadwal' => 4,
                'kelas' => 'EKLUSIF',
                'harga' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('bis')->insert($bis);
    }
}
