<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Grade\GradeStoreRequest;
use App\Models\Grade;
use App\Models\Submission;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function store(GradeStoreRequest $request, Submission $submission)
    {

        $grade = $request->validated();
        $grade['submission_id'] = $submission->id;
        $grade['teacher_id'] = auth()->id();

        Grade::updateOrCreate( ['submission_id' => $submission->id], $grade);

        $submission->update(['status' => 'graded']);

        return redirect()->route('submission.show', $submission);
    }
}
