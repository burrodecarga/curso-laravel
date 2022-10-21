<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Instructor\CoursesCurriculum;
use App\Http\Livewire\Instructor\CoursesStudents;
use Illuminate\Support\Facades\Route;

Route::redirect('','instructor/courses')->middleware([]);

Route::resource('courses',CourseController::class)->names('courses')->middleware([]);;

Route::get('courses/{course}/curriculum', CoursesCurriculum::class)
->middleware([])->name('courses.curriculum');

Route::get('courses/{course}/goals', [CourseController::class,'goals'])
->name('courses.goals')->middleware([]);

Route::get('courses/{course}/students',CoursesStudents::class)
->middleware([])->name('courses.students');

Route::post('courses/{course}/status', [CourseController::class,'status'])
->name('courses.status')->middleware([]);

Route::get('courses/{course}/observation', [CourseController::class,'observation'])
->name('courses.observation')->middleware([]);

