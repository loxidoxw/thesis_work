<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    public function show(Lesson $lesson)
    {
        $lesson->load('submission');
        return view('courses.lessons.show', compact('lesson'));
    }
}
