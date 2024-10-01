<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Books>
 */
class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 6,
            'title' => fake()->sentence(),
            'quantity' => fake()->numberBetween(1,10),
            'category'=>fake()->sentence(1),
            'cover'=>fake()->sentence(1),
            'price'=>fake()->numberBetween(1,10),
        ];
    }
}
