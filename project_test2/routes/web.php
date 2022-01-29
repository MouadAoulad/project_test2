<?php

use Illuminate\Support\Facades\Route;
use App\Currentschool\Currentschool;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::domain('{subdomain}.' . env('APP_URL'))->group(function () {
    // login
    Route::get('/', [App\Http\Controllers\HomeController::class,'index']);
    Route::post('/login', [Currentschool::class,'process']);
    Route::get('/logout',[App\Http\Controllers\UserController::class,'logout']);
    Route::get('/user', [App\Http\Controllers\UserController::class,'user']);
    
    // courses
    Route::get('/courses', [App\Http\Controllers\CourseController::class,'index']);
    Route::get('/course/{id}/delete', [App\Http\Controllers\CourseController::class,'delete']);
    Route::post('/course/add', [App\Http\Controllers\CourseController::class,'add']);
    Route::get('/course/{id}', [App\Http\Controllers\CourseController::class,'get']);
    Route::get('/course/{id}/join', [App\Http\Controllers\CourseController::class,'join']);

    // groups
    Route::get('/groups', [App\Http\Controllers\GroupsController::class,'index']);
    Route::get('/group/{id}/delete', [App\Http\Controllers\GroupsController::class,'delete']);
    Route::post('/group/add', [App\Http\Controllers\GroupsController::class,'add']);
    Route::get('/group/{id}', [App\Http\Controllers\GroupsController::class,'get']);
    Route::get('/group/{id}/join', [App\Http\Controllers\GroupsController::class,'join']);
    Route::post('/post/add', [App\Http\Controllers\GroupsController::class,'addpost']);
    Route::get('/post/{id}', [App\Http\Controllers\GroupsController::class,'editpost']);
    Route::post('/post/update', [App\Http\Controllers\GroupsController::class,'updatepost']);
    Route::get('/post/{id}/delete', [App\Http\Controllers\GroupsController::class,'deletePost']);

    // Users (teacher & students)
    Route::get('/teachers', [App\Http\Controllers\UserController::class,'getTeacher']);
    Route::get('/teacher/{id}/delete', [App\Http\Controllers\UserController::class,'deleteUser']);
    Route::post('/teacher/add', [App\Http\Controllers\UserController::class,'addTeacher']);
    Route::get('/students', [App\Http\Controllers\UserController::class,'getStudents']);
    Route::get('/student/{id}/delete', [App\Http\Controllers\UserController::class,'deleteUser']);
    Route::post('/student/add', [App\Http\Controllers\UserController::class,'addStudent']);
});

// Admin
Route::get('/directors', [App\Http\Controllers\AdminController::class,'getDirectors']);
Route::post('/director/add', [App\Http\Controllers\AdminController::class,'addDirector']);

Route::get('/schools', [App\Http\Controllers\AdminController::class,'getSchools']);
Route::post('/school/add', [App\Http\Controllers\AdminController::class,'addSchool']);