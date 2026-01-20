<?php

namespace Course;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Section;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubmissionCreationTest extends TestCase
{
//    use RefreshDatabase;
//
//    public function test_submission_can_be_created(): void {
//        $user = User::factory()->create([
//            'role' => 'student',
//        ]);
//        $course = Course::factory()->has(Section::factory()
//        ->has(Lesson::factory()))->create();
//        $submission = [
//            'student_id' => $user->id,
//            'lesson_id' => $lesson->id,
//            'file_path' => 'public/storage/lessons/tasks/Pz_9.pdf',];
//        $response = $this->actingAs($user)->post(route('submission.store', $lesson->id ), $submission);
//        $response->assertRedirect("/lesson/{$lesson->id}");
//    }
}
