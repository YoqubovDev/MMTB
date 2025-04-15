<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Kindergarten;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KindergartenController extends Controller
{
    /**
     * Display a listing of kindergartens by district.
     */
    public function index(Request $request): View
    {
        $districtId = $request->input('district_id');
        
        $query = Kindergarten::where('status', true);
        
        if ($districtId) {
            $query->where('district_id', $districtId);
        }
        
        $kindergartens = $query->with('district')->get();
        $districts = District::where('status', true)->get();
        
        return view('kindergartens.index', compact('kindergartens', 'districts', 'districtId'));
    }

    /**
     * Show the form for creating a new kindergarten.
     */
    public function create(): View
    {
        $districts = District::where('status', true)->get();
        
        return view('kindergartens.create', compact('districts'));
    }

    /**
     * Store a newly created kindergarten in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(Kindergarten::validationRules());
        
        Kindergarten::create($validated);
        
        return redirect()->route('kindergartens.index')
                         ->with('success', 'Kindergarten created successfully.');
    }

    /**
     * Display the specified kindergarten.
     */
    public function show(Kindergarten $kindergarten): View
    {
        $kindergarten->load('district');
        
        return view('kindergartens.show', compact('kindergarten'));
    }

    /**
     * Show the form for editing the specified kindergarten.
     */
    public function edit(Kindergarten $kindergarten): View
    {
        $districts = District::where('status', true)->get();
        
        return view('kindergartens.edit', compact('kindergarten', 'districts'));
    }

    /**
     * Update the specified kindergarten in storage.
     */
    public function update(Request $request, Kindergarten $kindergarten): RedirectResponse
    {
        $validated = $request->validate(Kindergarten::validationRules());
        
        $kindergarten->update($validated);
        
        return redirect()->route('kindergartens.show', $kindergarten)
                         ->with('success', 'Kindergarten updated successfully.');
    }

    /**
     * Remove the specified kindergarten from storage.
     */
    public function destroy(Kindergarten $kindergarten): RedirectResponse
    {
        $kindergarten->status = false;
        $kindergarten->save();
        
        return redirect()->route('kindergartens.index')
                         ->with('success', 'Kindergarten deleted successfully.');
    }
}

