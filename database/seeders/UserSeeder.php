<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::factory()->count(5)->create();

        User::factory()
            ->count(10)
            ->state(['role' => 'student'])
            ->hasAttached($courses)
            ->create();
    }
}
