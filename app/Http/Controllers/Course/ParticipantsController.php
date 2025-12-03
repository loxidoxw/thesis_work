<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    public function index(Course $course)
    {
        $users = $course->users()
//            ->where('users.id', '!=', auth()->id())
            ->get();
        return view('courses.participants', compact('users', 'course'));
    }
}
