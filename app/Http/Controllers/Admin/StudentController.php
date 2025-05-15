<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\StudentEducation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Mail\StudentRegistered;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all(); // Fetch all students
        return view('admin.pages.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.pages.students.register');
    }

    public function store(Request $request)
{
    // Validate base fields
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:students,email',
        'phone' => 'required|string',
        'dob' => 'required|date',
        'gender' => 'required|string',
        'address' => 'required|string',
        // Note: registration_date is not needed from form, we auto-generate
    ]);

    // Create student with today's date as registration
        $student = Student::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'dob' => $request->dob,
        'gender' => $request->gender,
        'address' => $request->address,
        'registration_date' => now()->toDateString(),
    ]);

    // Send confirmation email
    Mail::to($student->email)->send(new StudentRegistered($student));

    // Loop over dynamic education fields
    $degrees = $request->input('degree', []);
    $institutions = $request->input('institution', []);
    $fields = $request->input('field_of_study', []);
    $grades = $request->input('grade', []);
    $starts = $request->input('start_year', []);
    $ends = $request->input('end_year', []);
    $descs = $request->input('description', []);

    foreach ($degrees as $i => $degree) {
        StudentEducation::create([
            'student_id' => $student->id,
            'degree' => $degree,
            'institution' => $institutions[$i] ?? '',
            'field_of_study' => $fields[$i] ?? '',
            'start_year' => $starts[$i] ?? null,
            'end_year' => $ends[$i] ?? null,
            'grade' => $grades[$i] ?? '',
            'description' => $descs[$i] ?? '',
        ]);
    }

    return redirect()->back()->with('success', 'Registered Successfully!');
}


// View student and education
public function show($id)
{
    $student = Student::with('educations')->findOrFail($id);
    return view('admin.pages.students.show', compact('student'));
}

// Update student and education
public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);

    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:students,email,' . $student->id,
        'phone' => 'required|string',
        'dob' => 'required|date',
        'gender' => 'required|string',
        'address' => 'required|string',
    ]);

    $student->update($request->only([
        'name', 'email', 'phone', 'dob', 'gender', 'address'
    ]));

    // Delete existing educations and re-add (or do smart update if needed)
    $student->educations()->delete();

    foreach ($request->degree as $i => $degree) {
        $student->educations()->create([
            'degree' => $degree,
            'institution' => $request->institution[$i],
            'field_of_study' => $request->field_of_study[$i],
            'start_year' => $request->start_year[$i],
            'end_year' => $request->end_year[$i],
            'grade' => $request->grade[$i],
            'description' => $request->description[$i],
        ]);
    }

    return redirect()->back()->with('success', 'Student updated successfully!');
}


}
