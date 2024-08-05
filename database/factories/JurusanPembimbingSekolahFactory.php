<?php

namespace Database\Factories;

use App\Models\JurusanSekolah;
use App\Models\PembimbingSekolah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JurusanPembimbingSekolah>
 */
class JurusanPembimbingSekolahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'pembimbing_sekolah_id' => PembimbingSekolah::factory(),
            'jurusan_sekolah_id' => JurusanSekolah::factory(),
        ];
    }
}
