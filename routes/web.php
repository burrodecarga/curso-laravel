<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\CourseStatus;

Route::get('/', HomeController::class)->name('home');

Route::middleware([])->get('/courses', [CourseController::class,'index'])->name('courses.index');

Route::middleware([])->get('/courses/{course}',[CourseController::class,'show'])->name('courses.show');

Route::middleware(['auth'])->post('/courses/{course}/enrolled',[CourseController::class,'enrolled'])->name('courses.enrolled');

Route::middleware(['auth'])->get('/courses-status/{course}', CourseStatus::class)->name('courses.status');







Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
