<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MarketPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $product = 'Beras Premium';
        $startDate = Carbon::now()->subDays(9); // 10 hari ke belakang

        for ($i = 0; $i < 10; $i++) {
            DB::table('market_prices')->insert([
                'date' => $startDate->copy()->addDays($i)->format('Y-m-d'),
                'price' => rand(10000, 20000),
                'product_name' => $product,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
