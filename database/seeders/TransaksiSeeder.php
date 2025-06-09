<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 40; $i++) {
            $kuantitas = rand(5, 50); // kg
            $harga_satuan = rand(1000, 10000); // per kg
            $total = $kuantitas * $harga_satuan;

            DB::table('transaksi')->insert([
                'user_id' => 1, // pastikan user dengan id 1 ada
                'id_mitra' => 1, // pastikan mitra dengan id 1 ada
                'date' => Carbon::now()->subDays(rand(0, 30))->format('Y-m-d'),
                'jenis_transaksi' => rand(0, 1) ? 'penjualan' : 'pembelian',
                'id_sayur' => rand(1, 7), // random sayur ID
                'kuantitas' => $kuantitas,
                'price' => $harga_satuan,
                'total_transaksi' => $total,
                'jenis_pembayaran' => rand(0, 1) ? 'tunai' : 'DP',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
