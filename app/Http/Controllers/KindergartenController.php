<?php

namespace App\Http\Controllers;

use App\Models\Added;
use App\Models\District;
use App\Models\Kindergarten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KindergartenController extends Controller
{
    public function kindergarten()
    {
        $districts = District::where('status', true)->get();
        $kindergartens = Kindergarten::with('district')->get();

        // Add detailed debug logging
        \Log::info('Added method called');
        \Log::info('Districts count: ' . $districts->count());
        \Log::info('First district: ' . ($districts->first() ? $districts->first()->name : 'none'));
        \Log::info('View data keys: ' . implode(', ', array_keys(compact('districts', 'kindergartens'))));

        return view('kindergarten', compact('districts', 'kindergartens'));
    }

    public function search(Request $request)
    {
        $search = $request->query('search', '');
        $district = $request->query('district', '');

        $query = Kindergarten::query()
            ->when($search, fn($q) => $q->where('boqcha_raqami', 'like', "%{$search}%"))
            ->when($district, fn($q) => $q->whereHas('district', fn($q) => $q->where('name', $district)))
            ->with('district');

        return response()->json($query->get());
    }

    public function store(\App\Http\Requests\StoreKindergartenRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('boqcha_rasmlari')) {
            $data['boqcha_rasmlari'] = $request->file('boqcha_rasmlari')->store('kindergarten_images', 'public');
        }

        Kindergarten::create($data);

        return redirect()->back()->with('success', 'Boqcha muvaffaqiyatli qo‘shildi.');
    }

    public function update(\App\Http\Requests\UpdateKindergartenRequest $request, Kindergarten $kindergarten)
    {
        $data = $request->validated();

        if ($request->hasFile('boqcha_rasmlari')) {
            $data['boqcha_rasmlari'] = $request->file('boqcha_rasmlari')->store('kindergarten_images', 'public');
        }

        $kindergarten->update($data);

        return redirect()->back()->with('success', 'Boqcha muvaffaqiyatli yangilandi.');
    }

    public function destroy(Kindergarten $kindergarten)
    {
        $kindergarten->delete();
        return redirect()->back()->with('success', 'Boqcha muvaffaqiyatli o‘chirildi.');
    }
}
