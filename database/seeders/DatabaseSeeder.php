<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersSeeder::class);
        $this->call(SkillsLevelsSeeder::class);
        $this->call(CoursesSeeder::class);
        $this->call(ReviewsSeeder::class);
        $this->call(AdvertisementsSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(CategoriesCoursesSeeder::class);
        $this->call(ClosureCommentsSeeder::class);
    }
}
