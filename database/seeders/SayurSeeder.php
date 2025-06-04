<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\sayur;

class SayurSeeder extends Seeder
{
    public function run(): void
    {
        $sayurList = [
            'Bayam', 'Kangkung', 'Wortel', 'Kol', 'Brokoli', 'Sawi', 'Terong'
        ];

        foreach ($sayurList as $nama) {
            Sayur::create(['nama_sayur' => $nama]);
        }
    }
}
