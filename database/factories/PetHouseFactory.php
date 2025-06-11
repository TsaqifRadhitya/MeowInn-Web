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
            'description' => fake()->paragraph(),
            'locationPhotos' => json_encode(["https://bucketmeowinn.s3.ap-southeast-1.amazonaws.com/Image/WhatsApp+Image+2025-02-22+at+16.05.27_3e03ae56.jpg", "https://bucketmeowinn.s3.ap-southeast-1.amazonaws.com/Image/WhatsApp+Image+2025-02-22+at+16.05.27_3e03ae56.jpg"]),
            'petCareCost' => (int)fake()->numerify('####')
        ];
    }
}
