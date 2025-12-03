<?php

namespace App\Http\Controllers;

use App\Http\Requests\Submission\SubmissionStoreRequest;
use App\Models\Lesson;
use App\Models\Submission;

class SubmissionController extends Controller
{
    public function show()
    {
        return view('courses.lessons.submissions.show');
    }

    public function store(Lesson $lesson, SubmissionStoreRequest $request)
    {

        if ($lesson->type !== 'assignment') {
            abort(403, 'This lesson does not accept submissions.');
        }

        $data = $request->validated();

        if ($request->hasFile('file_path')) {
            $data['file_path'] = $request->file('file_path')->store('submissions', 'public');
        }
        $data['lesson_id'] = $lesson->id;
        $data['student_id'] = auth()->id();
        $data['status'] = 'submitted';

        Submission::create($data);

        return redirect()->route('lesson.show', $lesson);
    }
}
