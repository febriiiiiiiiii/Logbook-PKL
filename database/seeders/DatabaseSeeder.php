<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {        
        $this->call([
            AngkatanSeeder::class,
            SekolahSeeder::class,
            JurusanSeeder::class,
            JurusanSekolahSeeder::class,
            PembimbingSekolahSeeder::class,
            // JurusanPembimbingSekolahSeeder::class,
            PembimbingLapanganSeeder::class,
            SiswaSeeder::class,
            JadwalSeeder::class,
            UserSeeder::class,
            KegiatanSeeder::class,
        ]);
    }
}
