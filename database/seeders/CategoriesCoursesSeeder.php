<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Category;
use App\Models\Course;

class CategoriesCoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_course')->insert($this->getData());
    }

    private function getData()
    {
        $categories = Category::all();
        $courses = Course::all();
        $data = [];

        for ($i = 1; $i <= $courses->count(); $i++) {
            $count_categories = rand(1, 4);
            for ($j = 1; $j <= $count_categories; $j++) {
                $data[] = [
                    "category_id" => $categories->random()->id,
                    "course_id" => $i,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ];
            }
        }

        return $data;
    }
}
