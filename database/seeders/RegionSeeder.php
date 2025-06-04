<?php

namespace Database\Seeders;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    public function run()
    {
        // Contoh data kabupaten
        $kab1 = Kabupaten::create(['nama_kabupaten' => 'Kabupaten A']);
        $kab2 = Kabupaten::create(['nama_kabupaten' => 'Kabupaten B']);

        // Contoh data kecamatan
        Kecamatan::create(['nama_kecamatan' => 'Kecamatan 1', 'id_kabupaten' => $kab1->id_kabupaten]);
        Kecamatan::create(['nama_kecamatan' => 'Kecamatan 2', 'id_kabupaten' => $kab1->id_kabupaten]);
        Kecamatan::create(['nama_kecamatan' => 'Kecamatan 3', 'id_kabupaten' => $kab2->id_kabupaten]);
    }
}