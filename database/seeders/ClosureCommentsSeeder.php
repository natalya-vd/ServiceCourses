<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Comment;
use App\Models\Course;

class ClosureCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('closure_comments')->insert($this->getData());
    }

    private function getData()
    {
        $data = [];
        $courses = Course::all();

        $coursesWithComment = $courses->slice(0, round($courses->count() * 0.3));

        foreach ($coursesWithComment as $item) {
            $commentParent = Comment::factory()->for($item)->create();
            $commentChilde_1 = Comment::factory()->for($item)->create();
            $commentChilde_2 = Comment::factory()->for($item)->create();

            $data[] = [
                'parent_id' => $commentParent->id,
                'child_id' => $commentParent->id,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
            $data[] = [
                'parent_id' => $commentParent->id,
                'child_id' => $commentChilde_1->id,
                'depth' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
            $data[] = [
                'parent_id' => $commentParent->id,
                'child_id' => $commentChilde_2->id,
                'depth' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];

            $data[] = [
                'parent_id' => $commentChilde_1->id,
                'child_id' => $commentChilde_1->id,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
            $data[] = [
                'parent_id' => $commentChilde_1->id,
                'child_id' => $commentChilde_2->id,
                'depth' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];

            $data[] = [
                'parent_id' => $commentChilde_2->id,
                'child_id' => $commentChilde_2->id,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        }

        return $data;
    }
}
