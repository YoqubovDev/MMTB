<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Kindergarten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KindergartenController extends Controller
{
    public function kindergarten(Request $request)
    {
        $districts = District::where('status', true)->get();
        $districtName = $request->query('district');

        $query = Kindergarten::with('district');

        if ($districtName) {
            $query->whereHas('district', fn($q) => $q->where('name', $districtName));
        }

        $kindergartens = $query->get();

        Log::info('Kindergarten method called', [
            'district' => $districtName,
            'districts_count' => $districts->count(),
            'kindergartens_count' => $kindergartens->count(),
            'first_district' => $districts->first() ? $districts->first()->name : 'none',
        ]);

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
