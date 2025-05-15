<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::all();
        return view('admin.pages.staffs.index', compact('staff'));
    }

    public function create()
    {
        return view('admin.pages.staffs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:staff,email',
            'role'  => 'required|string|max:255',
        ]);

        Staff::create($validated);

        return redirect()->route('admin.pages.staffs.index')->with('success', 'Staff member created successfully.');
    }

    public function show($id)
    {
        $staff = Staff::findOrFail($id);
        return view('admin.pages.staffs.show', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:staff,email,' . $id,
            'role'  => 'required|string|max:255',
        ]);

        $staff = Staff::findOrFail($id);
        $staff->update($validated);

        return redirect()->route('admin.staff.show', $id)
                        ->with('success', 'Staff updated successfully.');
    }


    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();

        return redirect()->route('admin.pages.staffs.index')->with('success', 'Staff member deleted.');
    }
}
