<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\TrainerController;


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
    
    Route::get('/dashboard', [DashboardController::class, 'indexPage'])->name('dashboard');
    
    Route::get('/about', [AboutController::class, 'indexPage']);
    
    Route::get('/students', [StudentController::class, 'index']);
    
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('students', StudentController::class);
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('staff', App\Http\Controllers\Admin\StaffController::class);
    });


    
    Route::resource('staff', StaffController::class);
    Route::get('/staffs', [StaffController::class, 'index']);
    Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');
    
    Route::get('/trainings', [TrainingController::class, 'indexPage']);
    
    Route::get('/courses', [CourseController::class, 'indexPage']);
    
    Route::get('/trainers', [TrainerController::class, 'indexPage']);
    Route::get('/trainers/add-trainers', [TrainerController::class, 'create']);
    Route::post('/trainers', [TrainerController::class, 'store'])->name('trainers.store');
});

Route::get('/register', [StudentController::class, 'create'])->name('students.create');
// Route::post('/register', [StudentController::class, 'store'])->name('students.store');
Route::post('/register', [StudentController::class, 'store'])->name('student.store');

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');