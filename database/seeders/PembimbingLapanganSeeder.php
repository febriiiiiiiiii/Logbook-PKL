<?php

namespace Database\Seeders;

use App\Models\PembimbingLapangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembimbingLapanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PembimbingLapangan::factory()->count(100)->create();
    }
}
