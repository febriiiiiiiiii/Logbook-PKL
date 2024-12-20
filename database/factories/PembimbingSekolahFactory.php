<?php

namespace Database\Factories;

use App\Models\JurusanSekolah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PembimbingSekolah>
 */
class PembimbingSekolahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama'=>fake()->firstNameFemale(),
            'email'=>fake()->unique()->safeEmail(),
            'telephone'=>fake()->phoneNumber(),
            'alamat'=>fake()->address(),
            'jurusan_sekolah_id'=>JurusanSekolah::inRandomOrder()->first()->id,
            'gender'=>fake()->randomElement(['P','L']),
        ];
    }
}
