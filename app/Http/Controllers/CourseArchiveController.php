<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseArchiveController extends Controller
{
    public function archiveDownload()
    {
        return Storage::download('course_archives/course.zip', 'course.zip');
    }
}
