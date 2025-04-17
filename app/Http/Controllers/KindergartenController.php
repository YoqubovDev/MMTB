<?php

namespace App\Http\Controllers;

use App\Models\Added;
use App\Models\Kindergarten;
use Illuminate\Http\Request;
use App\Models\District; // Adjust based on your model
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KindergartenController extends Controller
{
    public function kindergarten()
    {
        $districts = District::where('status', true)->get();
        $kindergartens= Kindergarten::where('district_id', 2)->with('district')->get();

        // Add detailed debug logging
        \Log::info('Kindergarten method called');
        \Log::info('Districts count: ' . $districts->count());
        \Log::info('First district: ' . ($districts->first() ? $districts->first()->name : 'none'));
        \Log::info('View data keys: ' . implode(', ', array_keys(compact('districts', 'kindergartens'))));

        return view('kindergarten', compact('districts', 'kindergartens'));
    }
    public function index()
    {
        $kindergartens = Kindergarten::with('district')->get();
        return response()->json($kindergartens);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Kindergarten::validationRules(), Kindergarten::validationMessages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('boqcha_rasmlari')) {
            $file = $request->file('boqcha_rasmlari');
            $path = $file->store('kindergarten_images', 'public');
            $data['boqcha_rasmlari'] = $path;
        }

        $kindergarten = Kindergarten::create($data);

        return response()->json($kindergarten, 201);
    }

    public function show($id)
    {
        $kindergarten = Kindergarten::with('district')->findOrFail($id);
        return response()->json($kindergarten);
    }

    public function update(Request $request, $id)
    {
        $kindergarten = Kindergarten::findOrFail($id);

        $validator = Validator::make($request->all(), Kindergarten::validationRules(), Kindergarten::validationMessages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('boqcha_rasmlari')) {
            // Delete old image if exists
            if ($kindergarten->boqcha_rasmlari) {
                Storage::disk('public')->delete($kindergarten->boqcha_rasmlari);
            }
            $file = $request->file('boqcha_rasmlari');
            $path = $file->store('kindergarten_images', 'public');
            $data['boqcha_rasmlari'] = $path;
        }

        $kindergarten->update($data);

        return response()->json($kindergarten);
    }

    public function destroy($id)
    {
        $kindergarten = Kindergarten::findOrFail($id);

        // Delete image if exists
        if ($kindergarten->boqcha_rasmlari) {
            Storage::disk('public')->delete($kindergarten->boqcha_rasmlari);
        }

        $kindergarten->delete();

        return response()->json(['message' => 'Kindergarten deleted successfully']);
    }
}
