<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lesson\LessonStoreRequest;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    public function show(Lesson $lesson)
    {
        $submission = $lesson->submissions->where('student_id', auth()->id())->first();

        return view('courses.lessons.show', compact('lesson', 'submission'));
    }

    public function store(LessonStoreRequest $request, Course $course)
    {
        $lesson = $request->validated();

        if ($request->hasFile('content.file_path')) {
            $lesson['content']['file_path'] = $request->file('content.file_path')->store('lessons/tasks', 'public');
        }

        Lesson::create($lesson);
        return redirect()->route('course.show', $course);
    }
}
