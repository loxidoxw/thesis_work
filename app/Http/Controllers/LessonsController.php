<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lesson\LessonStoreRequest;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonsController extends Controller
{
    public function show(Lesson $lesson)
    {
        $submission = $lesson->submissions->where('student_id', auth()->id())->first();

        if ($lesson->type === 'lecture') {
            if ($lesson->file_url){
                return redirect()->away($lesson->file_url);
            }
            else abort(404);
        }

        return view('courses.lessons.show', compact('lesson', 'submission'));
    }

    public function store(LessonStoreRequest $request, Course $course)
    {
        $lesson = $request->validated();

        if ($request->hasFile('file_path')) {
            $lesson['file_path'] = $request->file('file_path')->store('lessons/tasks', 'public');
        }

        Lesson::create($lesson);
        return redirect()->route('course.show', $course);
    }
}
