<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District; // Adjust based on your model
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::all(); // Fetch all districts
        return view('districts.index', compact('districts'));
    }

    public function show($district)
    {
        $district = District::findOrFail($district); // Fetch district by ID or slug
        return view('districts.show', compact('district'));
    }

    public function schoolRegion()
    {
        // Existing logic for school regions
        $districts = District::with('schools')->get(); // Example
        return view('districts.schools', compact('districts'));
    }

    public function kindergartenRegion()
    {
        // Fetch districts with associated kindergartens
        $districts = District::with('kindergartens')->get(); // Adjust based on your model relationship
        $debugMessage = 'Kindergarten region data loaded successfully';
        $executionTime = round(microtime(true) * 1000) - LARAVEL_START;

        return view('districts.kindergartens', compact('districts', 'debugMessage', 'executionTime'));
    }
}
