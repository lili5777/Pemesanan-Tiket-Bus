<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = [
            [
                'username' => 'admin',
               'name'=>'ini akun Admin',
                'level'=>'admin',
               'password'=> bcrypt('123456'),
            ],
            [
                'username' => 'user',
               'name'=>'ini akun User (non admin)',
                'level'=>'user',
               'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
