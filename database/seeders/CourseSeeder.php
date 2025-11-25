<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Material;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory()
            ->count(10)
            ->has(Section::factory()->count(5)
                 ->has(Lesson::factory()->count(3)
                    ->has(Material::factory()->count(1))
                 )
            )
            ->create();
    }
}
