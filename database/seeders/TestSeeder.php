<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use App\Models\Section;
use App\Models\Lesson;
use Illuminate\Support\Facades\Hash;

class TestSeeder extends Seeder
{
    public function run()
    {
        $teacher = User::create([
            'name' => 'John Teacher',
            'email' => 'teacher@email.com',
            'password' => Hash::make('password'),
            'role' => 'teacher',
        ]);

        $student = User::create([
            'name' => 'Jane Student',
            'email' => 'student@email.com',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        $courses = Course::factory(2)->create([
            'title' => 'Test Course',
            'teacher_id' => $teacher->id,
        ]);

        foreach ($courses as $course) {
            $sections = Section::factory(2)->create([
                'title' => 'Test Section',
                'course_id' => $course->id,
            ]);

            foreach ($sections as $section) {
                Lesson::factory(3)->create([
                    'title' => 'Test Lesson',
                    'section_id' => $section->id,
                    'content' => [
                        'file_path' => 'public/storage/lessons/tasks/Pz_9.pdf',
                        'start-date' => '2025-10-23',
                        'deadline' => '2025-11-23'
                    ]
                ]);
            }
        }
    }
}
