<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function index()
    {
        return view('courses.activities');
    }
}
