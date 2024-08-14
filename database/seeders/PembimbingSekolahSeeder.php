<?php

namespace Database\Seeders;

use App\Models\PembimbingSekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembimbingSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PembimbingSekolah::factory()->count(100)->create();
    }
}
