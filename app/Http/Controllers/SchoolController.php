<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();

        return view('schools.index', compact('schools'));
    }

    public function create()
    {
        return view('schools.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:schools|max:255',
        ]);

        $school = new School;
        $school->name = $request->input('name');
        $school->location = $request->input('location');
        $school->save();

        return redirect()->route('schools.index')->with('success', 'School created successfully');
    }

    public function show($id)
    {
        $school = School::findOrFail($id);

        return view('schools.show', compact('school'));
    }

    public function edit($id)
    {
        $school = School::findOrFail($id);

        return view('schools.edit', compact('school'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:schools|max:255',
        ]);

        $school = School::findOrFail($id);
        $school->name = $request->input('name');
        $school->location = $request->input('location');
        $school->save();

        return redirect()->route('schools.index')->with('success', 'School updated successfully');
    }

    public function destroy($id)
    {
        $school = School::findOrFail($id);
        $school->delete();

        return redirect()->route('schools.index')->with('success', 'School deleted successfully');
    }

}
