<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(AlamatSeeder::class);
        $this->call(MitraSeeder::class);
        $this->call(SayurSeeder::class);
        $this->call(TransaksiSeeder::class);

    }
}
