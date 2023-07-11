<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(rand(60, 255)),
            'short_name' => fake()->text(rand(20, 100)),
            'price' => rand(500, 10000),
            'short_description' => fake()->text(rand(100, 255)),
            'description' => fake()->text(rand(800, 4000)),
            'what_you_will_learn' => fake()->text(rand(100, 1000)),
            'requirements' => fake()->text(rand(100, 1000)),
            'lang' => 'русский',
        ];
    }
}
