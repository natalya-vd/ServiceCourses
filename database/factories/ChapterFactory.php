<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chapter>
 */
class ChapterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(rand(20, 255)),
            'is_public' => false,
        ];
    }

    public function public(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'is_public' => true,
        ]);
    }
}
