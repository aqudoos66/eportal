<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('type', 'course')->with('trainer')->get();
        return view('admin.pages.courses.index', compact('courses'));
    }

    public function create()
    {
        $trainers = \App\Models\Trainer::all();
        return view('admin.pages.courses.create', compact('trainers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'trainer_id' => 'required|exists:trainers,id',
        ]);

        Course::create($validatedData);

        return redirect()->route('admin.pages.courses.index')
                         ->with('success', 'Course created successfully!');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }

}
