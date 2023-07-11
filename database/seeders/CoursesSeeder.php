<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

use App\Models\Course;
use App\Models\Chapter;
use App\Models\Teacher;
use App\Models\SkillLevel;
use App\Models\Lecture;
use App\Models\Article;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory()
            ->count(100)
            ->has(
                Chapter::factory()
                    ->has(Lecture::factory()->count(3), 'lectures')
                    ->public()
            )
            ->has(
                Chapter::factory()
                    ->count(4)
                    ->has(Lecture::factory()->count(3), 'lectures')
                    ->has(Article::factory()->count(2), 'articles')
            )
            ->state(new Sequence(
                fn (Sequence $sequence) => ['user_id' => Teacher::all()->random()->user_id],
            ))
            ->state(new Sequence(
                fn (Sequence $sequence) => ['skill_level_id' => SkillLevel::all()->random()],
            ))
            ->create();
    }
}
