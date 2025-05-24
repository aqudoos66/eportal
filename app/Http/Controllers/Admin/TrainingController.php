<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Training;

class TrainingController extends Controller
{
    public function indexPage()
    {
        return view('admin.pages.trainings.index');
    }

    public function index()
    {
        $trainings = Training::with('trainer')->get();
        return view('admin.trainings.index', compact('trainings'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'duration' => 'required|integer',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'trainer_id' => 'required|exists:trainers,id',
    ]);

    Course::create([
        'title' => $request->title,
        'description' => $request->description,
        'duration' => $request->duration,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'type' => 'training', // explicitly set type
        'trainer_id' => $request->trainer_id,
    ]);

    return redirect()->route('admin.pages.trainings.index')->with('success', 'Training created successfully.');
}


}
