<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mitra')->insert([
            [
                'nama_mitra' => 'Pak Budi',
                'id_alamat' => 1,
                'no_hp' => '081234567890',
                'jenis_mitra' => 'petani',
                'status_mitra' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_mitra' => 'Bu Sari',
                'id_alamat' => 2,
                'no_hp' => '082112345678',
                'jenis_mitra' => 'pelanggan',
                'status_mitra' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_mitra' => 'Mas Andi',
                'id_alamat' => 3,
                'no_hp' => '081298765432',
                'jenis_mitra' => 'petani',
                'status_mitra' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
