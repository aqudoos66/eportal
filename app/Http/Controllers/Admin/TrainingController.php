<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Trainer;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Course::with('trainer')->where('type', 'training')->get();
        return view('admin.pages.trainings.index', compact('trainings'));
    }

    public function create()
    {
        $trainers = Trainer::all();
        return view('admin.pages.trainings.create', compact('trainers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
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
            'type' => 'training',
            'trainer_id' => $request->trainer_id,
        ]);

        return redirect()->route('admin.pages.trainings.index')->with('success', 'Training created successfully.');
    }

public function destroy($id)
{
    $training = Course::findOrFail($id);
    $training->delete();

    return redirect()->route('admin.pages.trainings.index')->with('success', 'Training deleted successfully.');
}

    public function show($id)
    {
        $training = Course::with('trainer')->findOrFail($id);
        $training->start_date_formatted = \Carbon\Carbon::parse($training->start_date)->format('Y-m-d');
        $training->end_date_formatted = \Carbon\Carbon::parse($training->end_date)->format('Y-m-d');
        return view('admin.pages.trainings.show', compact('training'));

        // return view('admin.pages.trainings.show', compact('training'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'duration' => 'required|integer',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'trainer_id' => 'required|exists:trainers,id',
        'type' => 'required|string|in:course,training',
    ]);

    $training = Course::findOrFail($id);

    $training->update([
        'title' => $request->title,
        'description' => $request->description,
        'duration' => $request->duration,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'trainer_id' => $request->trainer_id,
        'type' => $request->type,
    ]);

    return redirect()->route('admin.trainings.index')->with('success', 'Training updated successfully.');
}




}
