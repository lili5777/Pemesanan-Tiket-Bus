<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class jadwal extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jadwal = [
            [
                'id_jadwal' => 1,
                'tujuan' => 'BONE',
                'pukul' => '16:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jadwal' => 2,
                'tujuan' => 'BONE',
                'pukul' => '07:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jadwal' => 3,
                'tujuan' => 'BANTAENG',
                'pukul' => '07:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jadwal' => 4,
                'tujuan' => 'BANTAENG',
                'pukul' => '16:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('jadwal')->insert($jadwal);
    }
}
