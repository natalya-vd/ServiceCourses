<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SkillLevel;

class SkillsLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SkillLevel::factory()->junior()->create();
        SkillLevel::factory()->middle()->create();
        SkillLevel::factory()->senior()->create();
    }
}
