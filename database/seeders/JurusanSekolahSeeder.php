<?php

namespace Database\Seeders;

use App\Models\JurusanSekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        JurusanSekolah::factory()->count(130)->create();
    }
}
