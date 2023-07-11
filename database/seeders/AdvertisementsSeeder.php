<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

use App\Models\Advertisement;
use App\Models\Course;

class AdvertisementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Advertisement::factory()
            ->count(30)
            ->state(new Sequence(
                fn (Sequence $sequence) => ['course_id' => Course::all()->random()],
            ))
            ->create();
    }
}
