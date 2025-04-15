<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\School;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SchoolController extends Controller
{
    /**
     * Display a listing of schools by district.
     */
    public function index(Request $request): View
    {
        $districtId = $request->input('district_id');
        
        $query = School::where('status', true);
        
        if ($districtId) {
            $query->where('district_id', $districtId);
        }
        
        $schools = $query->with('district')->get();
        $districts = District::where('status', true)->get();
        
        return view('schools.index', compact('schools', 'districts', 'districtId'));
    }

    /**
     * Show the form for creating a new school.
     */
    public function create(): View
    {
        $districts = District::where('status', true)->get();
        
        return view('schools.create', compact('districts'));
    }

    /**
     * Store a newly created school in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(School::validationRules());
        
        School::create($validated);
        
        return redirect()->route('schools.index')
                         ->with('success', 'School created successfully.');
    }

    /**
     * Display the specified school.
     */
    public function show(School $school): View
    {
        $school->load('district');
        
        return view('schools.show', compact('school'));
    }

    /**
     * Show the form for editing the specified school.
     */
    public function edit(School $school): View
    {
        $districts = District::where('status', true)->get();
        
        return view('schools.edit', compact('school', 'districts'));
    }

    /**
     * Update the specified school in storage.
     */
    public function update(Request $request, School $school): RedirectResponse
    {
        $validated = $request->validate(School::validationRules());
        
        $school->update($validated);
        
        return redirect()->route('schools.show', $school)
                         ->with('success', 'School updated successfully.');
    }

    /**
     * Remove the specified school from storage.
     */
    public function destroy(School $school): RedirectResponse
    {
        $school->status = false;
        $school->save();
        
        return redirect()->route('schools.index')
                         ->with('success', 'School deleted successfully.');
    }
}

