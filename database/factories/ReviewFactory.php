<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'text' => fake()->text(rand(800, 4000)),
            'rating' => rand(1, 5),
            'count_likes' => rand(0, 200),
            'count_dislikes' => rand(0, 30),
        ];
    }
}
