<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaksi')->insert([
            'user_id' => '1',
            'id_mitra' => '2',
            'tanggal_transaksi' => '2025-06-01',
            'jenis_transaksi' => 'penjualan',
            'id_sayur' => '1',
            'kuantitas' => '4.5',
            'harga_satuan' => '10000',
            'total_transaksi' => '45000',
            'jenis_pembayaran' => 'tunai',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
