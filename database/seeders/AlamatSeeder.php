<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlamatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('alamat')->insert([
            [
                'id_kecamatan' => 1,
                'detail_alamat' => 'Jl. Merdeka No. 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_kecamatan' => 2,
                'detail_alamat' => 'Jl. Pahlawan No. 5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_kecamatan' => 3,
                'detail_alamat' => 'Jl. Raya Sukamaju No. 10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
