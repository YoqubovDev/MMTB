<?php

namespace App\Http\Controllers;

use App\Http\Requests\KindergartenRequest;
use App\Models\Kindergarten;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class KindergartenController extends Controller
{
    public function kindergarten()
    {
        $districts = District::where('status', true)->get();
        $district_id = $_GET['kindergarten'];
        $kindergartens = Kindergarten::where('district_id',$district_id)->with('district')->get();

        // Add detailed debug logging
        \Log::info('Kindergarten method called');
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

    public function create(): View
    {
        $this->authorize('create', Kindergarten::class);
        $districts = District::where('status', true)->get();
        return view('kindergarten.create', compact('districts'));
    }

    /**
     * Display the specified Boqcha.
     *
     * @param  \App\Models\Kindergarten  $kindergarten
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(\App\Http\Requests\StoreKindergartenRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('boqcha_rasmlari')) {
            $data['boqcha_rasmlari'] = $request->file('boqcha_rasmlari')->store('kindergarten_images', 'public');
        }

        Kindergarten::create($data);

         return redirect()->back()->with('success', 'Boqcha muvaffaqiyatli qo‘shildi.');
    }

    public function show(Kindergarten $kindergarten): View
    {
        $kindergarten->load('district');
        return view('kindergarten.show', compact('kindergarten'));
    }


    public function update(KindergartenRequest $request, Kindergarten $kindergarten): RedirectResponse
    {

        try {
            Log::info('Starting update for Kindergarten ID: ' . $kindergarten->id);
            Log::info('Request data: ' . json_encode($request->all()));

            // Validation handled by KindergartenRequest
            $validated = $request->validated();
            $data = $validated;
            $oldFilePath = $kindergarten->boqcha_rasmlari;
            $newFilePath = null;

            return DB::transaction(function () use ($request, $kindergarten, $data, $oldFilePath, & $newFilePath) {
                // Handle file upload
                if ($request->hasFile('boqcha_rasmlari')) {
                    $file = $request->file('boqcha_rasmlari');
                    if ($file->isValid()) {
                        $request->validate([
                            'boqcha_rasmlari' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                        ]);

                        if (!Storage::disk('public')->exists('kindergartens')) {
                            Storage::disk('public')->makeDirectory('kindergartens');
                        }

                        $filename = time() . '_' . $file->getClientOriginalName();
                        $newFilePath = $file->storeAs('kindergartens', $filename, 'public');
                        $data['boqcha_rasmlari'] = $newFilePath;
                        Log::info('New file stored: ' . $newFilePath);

                        if ($oldFilePath && Storage::disk('public')->exists($oldFilePath)) {
                            Storage::disk('public')->delete($oldFilePath);
                            Log::info('Previous file deleted: ' . $oldFilePath);
                        }
                    } else {
                        throw new \Exception('Fayl noto‘g‘ri yuklandi');
                    }
                } else {
                    unset($data['boqcha_rasmlari']);
                }

                Log::info('Update data: ' . json_encode($data));
                $kindergarten->update($data);
                Log::info('kindergarten record updated successfully: ID ' . $kindergarten->id);

                return redirect()->route('kindergarten')->with('success', 'Muvaffaqiyatli yangilandi!');
            });
        } catch (\Exception $e) {
            if (isset($newFilePath) && Storage::disk('public')->exists($newFilePath)) {
                Storage::disk('public')->delete($newFilePath);
                Log::info('Deleted new file after failed update: ' . $newFilePath);
            }

            Log::error('Error updating kindergarten record for ID ' . $kindergarten->id . ': ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Ma\'lumotlarni yangilashda xatolik: ' . $e->getMessage()]);
        }
    }

    public function destroy(Kindergarten $kindergarten)
    {
        $kindergarten->delete();
        return redirect()->back()->with('success', 'Boqcha muvaffaqiyatli o‘chirildi.');
    }
}
