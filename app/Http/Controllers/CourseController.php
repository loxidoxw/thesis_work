<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\CourseStoreRequest;
use App\Http\Requests\Course\CourseUpdateRequest;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index() : View
    {
      $courses = Course::all();
       return view('courses.index', compact('courses'));
    }
    public function show(Course $request) : View
    {
        $course = $request->validated();
      Course::find()->where('id', $course);
      return view('courses.show', compact('course'));
    }

    public function create() : View
    {
        return view('courses.create');
    }
    public function store(CourseStoreRequest $request) : RedirectResponse
    {
        $course = $request->validated();
        Course::create($course);

        return redirect()->route('courses.index');
    }

    public function edit(Course $request) : View
    {
        return view('courses.edit', compact('request'));
    }

    public function update(CourseUpdateRequest $request, Course $course) : RedirectResponse
    {
       $course->update($request->validated());
       return redirect()->route('courses.index');
    }

    public function destroy(Course $course) : RedirectResponse
    {
        $course->delete();
        return redirect()->route('courses.index');
    }
}
