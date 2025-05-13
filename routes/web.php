<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\TrainingController;



// Public Auth Routes
Route::get('/login', [LoginController::class, 'indexPage'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [LoginController::class, 'registerPage']);
Route::post('/register', [LoginController::class, 'register']);

// Protected Routes (only for authenticated users)
Route::middleware(['auth'])->group(function () {
    
    Route::get('/', function () {
    return view('welcome');
    });
    
    Route::get('/dashboard', [DashboardController::class, 'indexPage']);
    Route::get('/about', [AboutController::class, 'indexPage']);
    Route::get('/students', [StudentController::class, 'indexPage']);
    Route::get('/staffs', [StaffController::class, 'indexPage']);
    Route::get('/trainings', [TrainingController::class, 'indexPage']);
    Route::get('/courses', [CourseController::class, 'indexPage']);
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');