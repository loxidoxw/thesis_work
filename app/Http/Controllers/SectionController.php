<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Section\SectionStoreRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function create(Course $course)
    {
        return view('courses.sections.create', compact('course'));
    }

    public function store(SectionStoreRequest $request, Course $course)
    {
        $data = $request->validated();
        $data['course_id'] = $course->id;
        $course->sections()->create($data);
        return redirect()->route('course.show', $course);
    }
}
