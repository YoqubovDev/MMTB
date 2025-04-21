<?php

namespace App\Http\Controllers;

use App\Models\Added;
use App\Models\District;
use App\Http\Requests\AddedRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AddedController extends Controller
{
    /**
     * Display a listing of schools.
     *
     * @return \Illuminate\View\View
     */
    public function school(Request $request)
    {
        $districts = District::where('status', true)->get();
        $tuman_id = $request->query('added');
        $addeds = $tuman_id ? Added::where('district_id', $tuman_id)->with('district')->get() : collect();

        \Log::info('School method called', [
            'tuman_id' => $tuman_id,
            'districts_count' => $districts->count(),
            'first_district' => $districts->first() ? $districts->first()->name : 'none',
            'addeds_count' => $addeds->count(),
            'view_data_keys' => implode(', ', array_keys(compact('districts', 'addeds')))
        ]);

        return view('added', compact('districts', 'addeds'));
    }

    /**
     * Show the form for creating a new school.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $districts = District::where('status', true)->get();
        return view('added.create', compact('districts'));
    }

    /**
     * Store a newly created school in storage.
     *
     * @param  \App\Http\Requests\AddedRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddedRequest $request): RedirectResponse
    {
        try {
            $validated = $request->validated();
            \Log::info('Validated data:', $validated);
            $data = $validated;
            $filePath = null;

            return DB::transaction(function () use ($request, $data, &$filePath) {
                \Log::info('Starting transaction for store');
                if ($request->hasFile('maktab_rasmlari')) {
                    $file = $request->file('maktab_rasmlari');
                    \Log::info('File detected:', ['name' => $file->getClientOriginalName()]);

                    $request->validate([
                        'maktab_rasmlari' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    if ($file->isValid()) {
                        try {
                            if (!Storage::disk('public')->exists('schools')) {
                                Storage::disk('public')->makeDirectory('schools');
                            }

                            $filename = time() . '_' . $file->getClientOriginalName();
                            $filePath = $file->storeAs('schools', $filename, 'public');
                            \Log::info('File stored:', ['path' => $filePath]);

                            $data['maktab_rasmlari'] = $filePath;
                        } catch (\Exception $e) {
                            \Log::error('File upload failed: ' . $e->getMessage());
                            throw $e;
                        }
                    } else {
                        \Log::error('Invalid file uploaded');
                        throw new \Exception('Faylni yuklashda muammo yuz berdi');
                    }
                }

                \Log::info('Creating Added record:', $data);
                $added = Added::create($data);
                \Log::info('Added record created:', ['id' => $added->id]);

                return redirect()->route('added', ['added' => $data['district_id']])
                    ->with('success', 'Muvaffaqiyatli saqlandi!');
            });
        } catch (\Exception $e) {
            if (isset($filePath) && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
                \Log::info('Deleted orphaned file: ' . $filePath);
            }

            \Log::error('Store failed: ' . $e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return back()->withInput()->withErrors(['error' => 'Ma\'lumotlarni saqlashda xatolik: ' . $e->getMessage()]);
        }
    }


    /**
     * Display the specified school.
     *
     * @param  \App\Models\Added  $added
     * @return \Illuminate\View\View
     */
    public function show(Added $added): View
    {
        $added->load('district');
        return view('added.show', compact('added'));
    }
    /**
     * Show the form for editing the specified school.
     *
     * @param  \App\Models\Added  $added
     * @return \Illuminate\View\View
     */
    public function edit(Added $added): View
    {
        $districts = District::where('status', true)->get();
        return view('added.edit', compact('added', 'districts'));
    }

    /**
     * Update the specified school in storage.
     *
     * @param  \App\Http\Requests\AddedRequest  $request
     * @param  \App\Models\Added  $added
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AddedRequest $request, Added $added): RedirectResponse
    {
        $this->authorize('update', $added);

        try {
            $validated = $request->validated();
            $data = $validated;
            $oldFilePath = $added->maktab_rasmlari;
            $newFilePath = null;

            return DB::transaction(function () use ($request, $added, $data, $oldFilePath, &$newFilePath) {
                if ($request->hasFile('maktab_rasmlari')) {
                    $file = $request->file('maktab_rasmlari');

                    if (!$file->isValid()) {
                        throw new \Exception('Fayl buzilgan yoki noto\'g\'ri yuklangan');
                    }

                    try {
                        if (!Storage::disk('public')->exists('schools')) {
                            Storage::disk('public')->makeDirectory('schools');
                        }

                        $filename = time() . '_' . $file->getClientOriginalName();
                        $newFilePath = $file->storeAs('schools', $filename, 'public');

                        if (!$newFilePath) {
                            throw new \Exception('Faylni saqlashda xatolik');
                        }

                        $data['maktab_rasmlari'] = $newFilePath;
                        Log::info('New file stored for school ID ' . $added->id . ': ' . $newFilePath);

                        if ($oldFilePath && Storage::disk('public')->exists($oldFilePath)) {
                            Storage::disk('public')->delete($oldFilePath);
                            Log::info('Previous file deleted for school ID ' . $added->id . ': ' . $oldFilePath);
                        }
                    } catch (\Exception $e) {
                        Log::error('File update failed for school ID ' . $added->id . ': ' . $e->getMessage());
                        throw new \Exception('Fayl yangilashda xatolik: ' . $e->getMessage());
                    }
                } else {
                    unset($data['maktab_rasmlari']);
                }

                $added->update($data);
                Log::info('Added record updated successfully: ID ' . $added->id);

                return redirect()->route('added')->with('success', 'Muvaffaqiyatli yangilandi!');
            });
        } catch (\Exception $e) {
            if (isset($newFilePath) && Storage::disk('public')->exists($newFilePath)) {
                Storage::disk('public')->delete($newFilePath);
                Log::info('Deleted new file after failed school update: ' . $newFilePath);
            }

            Log::error('Error updating Added record for ID ' . $added->id . ': ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Ma\'lumotlarni yangilashda xatolik: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified school from storage.
     *
     * @param  \App\Models\Added  $added
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Added $added): RedirectResponse
    {

        try {
            return DB::transaction(function () use ($added) {
                if ($added->maktab_rasmlari && Storage::disk('public')->exists($added->maktab_rasmlari)) {
                    Storage::disk('public')->delete($added->maktab_rasmlari);
                    Log::info('File deleted with record: ' . $added->maktab_rasmlari);
                }

                $added->delete();
                Log::info('Added record deleted successfully: ID ' . $added->id);

                return redirect()->route('added')->with('success', 'Muvaffaqiyatli o\'chirildi!');
            }, 5);
        } catch (\Exception $e) {
            Log::error('Error deleting Added record: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Ma\'lumotlarni o\'chirishda xatolik: ' . $e->getMessage()]);
        }
    }
}
