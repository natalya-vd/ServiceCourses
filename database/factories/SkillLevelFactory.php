<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SkillLevel>
 */
class SkillLevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->text(rand(20, 255)),
        ];
    }

    public function junior(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                "name" => 'Начальный уровень',
            ];
        });
    }
    public function middle(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                "name" => 'Средний уровень',
            ];
        });
    }
    public function senior(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                "name" => 'Продвинутый уровень',
            ];
        });
    }
}
