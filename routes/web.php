<?php

use App\Http\Controllers\Course\ActivitiesController;
use App\Http\Controllers\Course\CompetenciesController;
use App\Http\Controllers\Course\GradeController;
use App\Http\Controllers\Course\ParticipantsController;
use App\Http\Controllers\CourseArchiveController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [CourseController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:teacher'])->group(function () {
    Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
    Route::post('/course', [CourseController::class, 'store'])->name('course.store');
    Route::get('/course/{course}/section/create', [SectionController::class, 'create'])->name('section.create');
    Route::post('/course/{course}/section', [SectionController::class, 'store'])->name('section.store');
    Route::post('/course/{course}/lesson', [LessonsController::class, 'store'])->name('lesson.store');
});

Route::middleware(['auth', 'verified'])->prefix('/course/{course}')->name('course.')->group(function ()
{
    Route::get('/', [CourseController::class, 'show'])->name('show');
    Route::get('/archive-download', [CourseArchiveController::class, 'archiveDownload'])->name('archive');
    Route::get('/participants', [ParticipantsController::class, 'index'])->name('participants');
    Route::get('/grade', [GradeController::class, 'index'])->name('grade');
    Route::get('/competencies', [CompetenciesController::class, 'index'])->name('competencies');
    Route::get('/activities', [ActivitiesController::class, 'index'])->name('activities');

});

Route::middleware(['auth', 'verified'])->group(function () {
   Route::get('/lesson/{lesson}', [LessonsController::class, 'show'])->name('lesson.show');
   Route::post('/lesson/{lesson}/submission', [SubmissionController::class, 'store'])->name('submission.store');
    Route::get('submission/{submission}', [SubmissionController::class, 'show'])->name('submission.show');
    Route::post('submission/{submission}/grade', [GradeController::class, 'store'])->name('grade.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
