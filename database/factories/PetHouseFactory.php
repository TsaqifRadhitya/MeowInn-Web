<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PetHouse>
 */
class PetHouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'deskripsi' => fake()->paragraph(),
            'status_penjemputan' => false,
            'alamat' =>fake()->address(),
            'lat' => fake()->latitude(),
            'lng' => fake()->longitude(),
            'kabupaten' => fake()->city()
        ];
    }
}
