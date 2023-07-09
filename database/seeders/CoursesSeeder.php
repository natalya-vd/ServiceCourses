<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert($this->getData());
    }

    private function getData()
    {
        $count = 200;
        $data = [];

        for ($i = 1; $i <= $count; $i++) {
            $data[] = [
                'name' => fake()->realText(rand(60, 255)),
                'short_name' => fake('en_US')->realText(rand(20, 100)),
                'price' => rand(500, 10000),
                'short_description' => fake()->realText(rand(100, 255)),
                'description' => fake()->realText(rand(800, 4000)),
                'what_you_will_learn' => fake()->realText(rand(100, 1000)),
                'requirements' => fake()->realText(rand(100, 1000)),
                'lang' => 'русский',
                'user_id' => rand(3, 5),
                'skill_level_id' => rand(1, 3),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        }

        return $data;
    }
}
