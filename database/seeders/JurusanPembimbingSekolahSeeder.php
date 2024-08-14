<?php

namespace Database\Seeders;

use App\Models\JurusanPembimbingSekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanPembimbingSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        JurusanPembimbingSekolah::factory()->count(110)->create();
    }
}
