<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TeachersSeeder extends Seeder
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
        $count = 5;
        $data = [];

        for ($i = 3; $i <= $count; $i++) {
            $data[] = [
                'description' => fake()->realText(rand(800, 2000)),
                'user_id' => $i,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        }

        return $data;
    }
}
