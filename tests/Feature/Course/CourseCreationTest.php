<?php

namespace Tests\Feature\Course;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseCreationTest extends TestCase
{
//    use RefreshDatabase;
//
//    public function test_new_course_can_be_created(): void {
//
//        $teacher = User::factory()->create([
//            'role' => 'teacher',
//            'email_verified_at' => now()
//        ]);
//        $course = [
//            'title' => 'Test Course',
//            'description' => 'Test Course Description',
//            'teacher_id' => $teacher->id,];
//
//        $response = $this->actingAs($teacher)->post(route('course.store'), $course);
//
//        $response->assertRedirect('/courses');
//        $this->assertDatabaseHas('courses', [
//            'title' => 'Test Course',
//        ]);
//}
}
