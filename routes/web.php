<?php

use App\Http\Controllers\Course\ActivitiesController;
use App\Http\Controllers\Course\CompetenciesController;
use App\Http\Controllers\Course\GradesController;
use App\Http\Controllers\Course\ParticipantsController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [CourseController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('/course/{course}')->name('course.')->group(function ()
{
    Route::get('/', [CourseController::class, 'show'])->name('show');
    Route::get('/participants', ParticipantsController::class)->name('participants');
    Route::get('/grades', GradesController::class)->name('grades');
    Route::get('/competencies', CompetenciesController::class)->name('competencies');
    Route::get('/activities', ActivitiesController::class)->name('activities');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
