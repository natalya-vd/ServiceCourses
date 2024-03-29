<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake('ru_RU')->name(),
            'login' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('12345'),
            "role" => 'USER',
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function admin(): Factory
    {
        return $this->state(fn (array $attributes) => [
            "name" => 'Администратор',
            "email" => 'admin@admin.ru',
            "login" => 'admin',
            'role' => 'ADMIN',
        ]);
    }

    public function teacher(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'TEACHER',
        ]);
    }
}
