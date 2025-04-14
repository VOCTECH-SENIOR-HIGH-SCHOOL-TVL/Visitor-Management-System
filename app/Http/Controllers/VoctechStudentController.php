<?php

namespace App\Http\Controllers;

use App\Models\VoctechStudent;
use Illuminate\Http\Request;

class VoctechStudentController extends Controller
{
    public function index()
    {
        $voctechstudents = VoctechStudent::paginate(10);
        return view('voctechstudents.index', compact('voctechstudents'));
    }

    public function create()
    {
        return view('voctechstudents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        VoctechStudent::create($request->all());
        return redirect()->route('voctechstudents.index')->with('success', 'Voctech student added successfully.');
    }

    public function visit(Request $request, VoctechStudent $voctechstudent)
    {
        $request->validate([
            'visitor_name' => 'required|string|max:255',
        ]);

        $voctechstudent->increment('visits_count');
        $voctechstudent->last_visitor = $request->visitor_name; // Store the name of the visitor
        $voctechstudent->save();

        return redirect()->route('voctechstudents.index')->with('success', 'Visit recorded successfully.');
    }

    public function edit(VoctechStudent $voctechstudent)
    {
        return view('voctechstudents.edit', compact('voctechstudent'));
    }

    public function update(Request $request, VoctechStudent $voctechstudent)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        $voctechstudent->update($request->all());
        return redirect()->route('voctechstudents.index')->with('success', 'Voctech student updated successfully.');
    }

    public function destroy(VoctechStudent $voctechstudent)
    {
        $voctechstudent->delete();
        return redirect()->route('voctechstudents.index')->with('success', 'Voctech student deleted successfully.');
    }
}