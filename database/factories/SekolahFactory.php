<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sekolah>
 */
class SekolahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama'=>fake()->company(),
            'email'=>fake()->unique()->safeEmail(),
            'telephone'=>fake()->phoneNumber(),
            'alamat'=>fake()->address(),
        ];
    }
}
