<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\PriceController;

Route::get('', [HomeController::class,'index'])->middleware([])->name('home');

Route::resource('roles',RoleController::class)->names('roles');

Route::resource('users',UserController::class)->names('users');

Route::resource('categories',CategoryController::class)->names('categories');

Route::resource('levels',LevelController::class)->names('levels');

Route::resource('prices',PriceController::class)->names('prices');



Route::get('courses', [CourseController::class,'index'])->middleware([])->name('courses');

Route::get('courses/{course}', [CourseController::class,'show'])->middleware([])->name('courses.show');

Route::post('courses/{course}/aproved', [CourseController::class,'aproved'])->middleware([])->name('courses.aproved');

Route::get('courses/{course}/obsevation', [CourseController::class,'observation'])->middleware([])->name('courses.observation');


Route::post('courses/{course}/reject', [CourseController::class,'reject'])->middleware([])->name('courses.reject');








