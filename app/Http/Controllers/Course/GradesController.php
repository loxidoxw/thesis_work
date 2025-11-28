<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    public function __invoke()
    {
        return view('courses.grades');
    }
}
