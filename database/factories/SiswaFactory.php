<?php

namespace Database\Factories;

use App\Models\Angkatan;
use App\Models\JurusanPembimbingSekolah;
use App\Models\PembimbingLapangan;
use App\Models\PembimbingSekolah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama'=>fake()->name(),
            'alamat'=>fake()->address(),
            'email'=>fake()->unique()->safeEmail(),
            'telephone'=>fake()->phoneNumber(),
            'angkatan_id'=> Angkatan::inRandomOrder()->first()->id,
            'pembimbing_sekolah_id'=>PembimbingSekolah::inRandomOrder()->first()->id,
            'pembimbing_lapangan_id'=>PembimbingLapangan::inRandomOrder()->first()->id,
        ];
    }
}
