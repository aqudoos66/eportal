<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\TrainerController;


Route::get('/login', [LoginController::class, 'indexPage'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [LoginController::class, 'registerPage']);
Route::post('/register', [LoginController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    
    Route::get('/', function () {
    return view('welcome');
    });

    


    Route::resource('trainings', TrainingController::class);
    
    Route::get('/dashboard', [DashboardController::class, 'indexPage'])->name('dashboard');
    
    Route::get('/about', [AboutController::class, 'indexPage']);

    Route::get('/students', [StudentController::class, 'index']);
    
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('students', StudentController::class);
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('staff', App\Http\Controllers\Admin\StaffController::class);
    });
    
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('courses', CourseController::class);
    });

    Route::prefix('admin')->name('admin.')->middleware(['auth', 'is_admin'])->group(function () {
        Route::resource('trainings', TrainingController::class);
    });

    Route::resource('admin/trainings', TrainingController::class)->names([
    'index' => 'admin.pages.trainings.index',
    'create' => 'admin.pages.trainings.create',
    'store' => 'admin.pages.trainings.store',
    'show' => 'admin.pages.trainings.show',
    'edit' => 'admin.pages.trainings.edit',
    'update' => 'admin.pages.trainings.update',
    'destroy' => 'admin.pages.trainings.destroy',
]);

    
    Route::resource('staff', StaffController::class);
    Route::get('/staffs', [StaffController::class, 'index']);
    Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');
    
    Route::get('/trainings', [TrainingController::class, 'indexPage']);

    Route::delete('/admin/courses/{course}', [CourseController::class, 'destroy'])->name('admin.courses.destroy');

    
    Route::get('/courses', [CourseController::class, 'index']);
    
    Route::get('/trainers', [TrainerController::class, 'indexPage']);
    Route::resource('admin/trainers', TrainerController::class)->names([
    'index' => 'admin.pages.trainers.index',
    'create' => 'admin.pages.trainers.create',
    'store' => 'admin.pages.trainers.store',
    'show' => 'admin.pages.trainers.show',
    'edit' => 'admin.pages.trainers.edit',
    'update' => 'admin.pages.trainers.update',
    'destroy' => 'admin.pages.trainers.destroy',
]);


});

Route::get('/register', [StudentController::class, 'create'])->name('students.create');
Route::post('/register', [StudentController::class, 'store'])->name('student.store');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');