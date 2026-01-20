<?php

namespace Tests\Feature\Course;

use App\Models\Course;
use App\Models\Section;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseCreationTest extends TestCase
{
    use RefreshDatabase;

    public function test_course_creation_screen_can_be_rendered(): void {
        $response = $this->get(route('course.create'));
        $response->assertStatus(302);
    }

    public function test_new_course_can_be_created(): void {

        $teacher = User::factory()->create([
            'role' => 'teacher',
            'email_verified_at' => now()
        ]);
        $course = [
            'title' => 'Test Course',
            'description' => 'Test Course Description',
            'teacher_id' => $teacher->id,];

        $response = $this->actingAs($teacher)->post(route('course.store'), $course);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('courses', [
            'title' => 'Test Course',
        ]);
}

    public function test_new_course_can_be_created_with_sections(): void {
        $teacher = User::factory()->create([
            'role' => 'teacher',
            'email_verified_at' => now()
        ]);
        $course = Course::factory()->create();
        $section = [
            'title' => 'Test Section',
            'order' => 1,
            'course_id' => $course['id'],];

        $response = $this->actingAs($teacher)->post(route('section.store', $course->id ), $section);

        $response->assertRedirect("/course/{$course->id}");
        $this->assertDatabaseHas('sections', [
            'title' => 'Test Section',
        ]);
    }

    public function test_new_course_can_be_created_with_lessons(): void {
        $teacher = User::factory()->create([
            'role' => 'teacher',
            'email_verified_at' => now()
        ]);
        $course = Course::factory()->create();
        $section = Section::factory()->create([
            'course_id' => $course['id'],]);
        $lesson = [
            'title' => 'Test Lesson',
            'section_id' => $section['id'],
            'type' => 'lecture',
            'order' => 1
        ];
        $response = $this->actingAs($teacher)->post(route('lesson.store', $section->id ), $lesson);
        $response->assertRedirect("/course/{$course->id}");
        $this->assertDatabaseHas('lessons', [
            'title' => 'Test Lesson',
        ]);
    }
}
