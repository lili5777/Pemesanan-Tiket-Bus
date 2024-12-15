<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kursi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [];
        $tanggal = '2024-12-04';

        // Generate kursi data
        for ($cycle = 0; $cycle < 2; $cycle++) {
            for ($id_bis = 1; $id_bis <= 8; $id_bis++) {
                for ($i = 1; $i <= 14; $i++) {
                    $data[] = [
                        'id_kursi' => count($data) + 1,
                        'id_bis' => $id_bis,
                        'nomor_kursi' => sprintf(($id_bis % 2 == 0 ? 'B%02d' : 'A%02d'), $i),
                        'status' => 'tidak terisi',
                        'tanggal' => $tanggal,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
            // Update tanggal for the next cycle
            $tanggal = date('Y-m-d', strtotime($tanggal . ' +1 day'));
        }

        DB::table('kursi')->insert($data);
    }
}
