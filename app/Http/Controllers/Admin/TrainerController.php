<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainer;


class TrainerController extends Controller
{
    public function index(){
        $trainers = \App\Models\Trainer::all();  // Fetch all trainers from DB
        return view('admin.pages.trainer.index', compact('trainers'));
    }

        public function indexPage(){
        $trainers = \App\Models\Trainer::all();  // Fetch all trainers from DB
        return view('admin.pages.trainer.index', compact('trainers'));
    }

    public function create(){
        return view('admin.pages.trainer.create');
    }

    public function show($id)
    {
        $trainer = Trainer::findOrFail($id);
        return view('admin.pages.trainer.show', compact('trainer'));
    }

    public function store(Request $request)
    {
        // Validate form input
        $validatedData = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:trainers,email',
            'phone'     => 'required|string|max:20',
            'expertise' => 'required|string|max:255',
            'cnic'      => 'required|string|max:20|unique:trainers,cnic',
        ]);

        // Create trainer
        Trainer::create($validatedData);

        // Redirect with success message
        return redirect()->back()->with('success', 'Trainer added successfully!');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:trainers,email,' . $id,
        'phone' => 'required|string',
        'expertise' => 'required|string',
        'cnic' => 'required|string|unique:trainers,cnic,' . $id,
    ]);

    $trainer = Trainer::findOrFail($id);
    $trainer->update($request->all());

    return redirect()->route('admin.pages.trainers.index')->with('success', 'Trainer updated successfully.');
}

public function destroy($id)
{
    $trainer = Trainer::findOrFail($id);
    $trainer->delete();

    return redirect()->route('admin.pages.trainers.index')->with('success', 'Trainer deleted successfully.');
}

}
