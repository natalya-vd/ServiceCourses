<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

use App\Models\Review;
use App\Models\Course;
use App\Models\User;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::factory()
            ->count(200)
            ->state(new Sequence(
                fn (Sequence $sequence) => ['user_id' => User::all()->random()],
            ))
            ->state(new Sequence(
                fn (Sequence $sequence) => ['course_id' => Course::all()->random()],
            ))
            ->create();
    }
}
