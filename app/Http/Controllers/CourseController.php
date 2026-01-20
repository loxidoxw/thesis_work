<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\CourseStoreRequest;
use App\Http\Requests\Course\CourseUpdateRequest;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(Course $courses) : View
    {
        if (auth()->user()->role == 'student')
        {
            $courses = auth()->user()->courses()->paginate(8);
        }
        else
        {
            $courses = Course::where('teacher_id', auth()->id())->paginate(8);
        }

       return view('courses.index', compact('courses'));
    }
    public function show(Course $course) : View
    {
        $sections = $course->sections()->with('lessons')->orderBy('order')->get();

        $lessons = $sections->pluck('lessons')->flatten();


      return view('courses.show', compact('course', 'sections', 'lessons'));
    }

    public function create() : View
    {
        return view('courses.create');
    }
    public function store(CourseStoreRequest $request) : RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('courses/thumbnails', 'public');
        }
        $data['teacher_id'] = auth()->id();
        Course::create($data);

        return redirect()->route('dashboard');
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
