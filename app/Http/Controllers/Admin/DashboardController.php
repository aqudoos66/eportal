<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
// use App\Models\Course;
// use App\Models\Enrollment;
use App\Models\Staff;
use App\Models\Trainer;
// use App\Models\Training;
// use App\Models\TrainingCourse;

class DashboardController extends Controller
{
    public function indexPage()
    {
        //fetch total staff
        // $totalStaffs = Staff::count();
        
        //fetch total trainers
        // $totalTrainers = Trainer::count();
        
        //fetch total courses
        // $totalCourses = Course::count();
        
        //fetch total trainings
        // $totalTrainings = Training::count();
        
        //fetch total students
        $totalStudents = Student::count();

        // return view('admin.pages.dashboard.index', compact('totalStudents'));
        return view('admin.pages.dashboard.index', compact('totalStudents'));
    }
}
