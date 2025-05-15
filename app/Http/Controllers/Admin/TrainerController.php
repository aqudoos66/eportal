<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function indexPage(){
        return view('admin.pages.trainer.index');
    }

    public function create(){
        return view('admin.pages.trainer.create');
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
}
