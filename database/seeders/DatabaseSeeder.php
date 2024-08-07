<?php

namespace Database\Seeders;

use App\Models\Angkatan;
use App\Models\Jurusan;
use App\Models\JurusanPembimbingSekolah;
use App\Models\JurusanSekolah;
use App\Models\PembimbingLapangan;
use App\Models\PembimbingSekolah;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\User;
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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // for ($i=2022; $i < 2025 ; $i++) { 
        //     # code...

        //     Angkatan::create(['periode' => $i]);
        // }

        // PembimbingLapangan::factory(10)->create();

        // Sekolah::factory(10)->create();

        // PembimbingSekolah::factory(10)->create();

        // Jurusan::factory(7)->create();

        // JurusanSekolah::factory(10)->create();
        
        // JurusanPembimbingSekolah::factory(10)->create();

        // Angkatan::factory(10)->create();

        // Siswa::factory()->count(10)->create();

        // Angkatan::factory(20)->create();
        // Jurusan::factory(20)->create();
        // JurusanPembimbingSekolah::factory(20)->create();
        // JurusanSekolah::factory(20)->create();
        // PembimbingLapangan::factory(20)->create();
        // PembimbingSekolah::factory(20)->create();
        // Sekolah::factory(20)->create();
        Siswa::factory(20)->create();
    }
}
