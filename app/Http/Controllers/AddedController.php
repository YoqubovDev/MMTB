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

        // Add detailed debug logging
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
            // Validation handled by AddedRequest
            $validated = $request->validated();
            $data = $validated;
            $filePath = null;

            return DB::transaction(function () use ($request, $data, &$filePath) {
                // Handle file upload with error handling
                if ($request->hasFile('maktab_rasmlari')) {
                    $file = $request->file('maktab_rasmlari');

                    // Faylni validatsiya qilish
                    $request->validate([
                        'maktab_rasmlari' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    // Faylni saqlash
                    if ($file->isValid()) {
                        try {
                            if (!Storage::disk('public')->exists('schools')) {
                                Storage::disk('public')->makeDirectory('schools');
                            }

                            $filename = time() . '_' . $file->getClientOriginalName();
                            $filePath = $file->storeAs('schools', $filename, 'public');

                            $data['maktab_rasmlari'] = $filePath;
                            Log::info('File uploaded successfully: ' . $filePath);
                        } catch (\Exception $e) {
                            Log::error('File upload failed: ' . $e->getMessage());
                            throw new \Exception('Fayl yuklashda xatolik: ' . $e->getMessage());
                        }
                    } else {
                        throw new \Exception('Faylni yuklashda muammo yuz berdi');
                    }
                }

                $added = Added::create($data);
                Log::info('Added record created successfully with ID: ' . $added->id);

                return redirect()->route('added')->with('success', 'Muvaffaqiyatli saqlandi!');
            });
        } catch (\Exception $e) {
            if (isset($filePath) && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
                Log::info('Deleted orphaned file after failed school creation: ' . $filePath);
            }

            Log::error('Error creating Added record: ' . $e->getMessage());
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
            // Validation handled by AddedRequest
            $validated = $request->validated();
            $data = $validated;
            $oldFilePath = $added->maktab_rasmlari;
            $newFilePath = null;

            return DB::transaction(function () use ($request, $added, $data, $oldFilePath, &$newFilePath) {
                // Handle file upload for update
                if ($request->hasFile('maktab_rasmlari')) {
                    $file = $request->file('maktab_rasmlari');

                    // Verify file is valid
                    if (!$file->isValid()) {
                        throw new \Exception('Fayl buzilgan yoki noto\'g\'ri yuklangan');
                    }

                    try {
                        // Create storage/app/public/schools directory if it doesn't exist
                        if (!Storage::disk('public')->exists('schools')) {
                            Storage::disk('public')->makeDirectory('schools');
                        }

                        // Store with a unique name based on timestamp and original filename
                        $filename = time() . '_' . $file->getClientOriginalName();
                        $newFilePath = $file->storeAs('schools', $filename, 'public');

                        if (!$newFilePath) {
                            throw new \Exception('Faylni saqlashda xatolik');
                        }

                        $data['maktab_rasmlari'] = $newFilePath;
                        Log::info('New file stored for school ID ' . $added->id . ': ' . $newFilePath);

                        // Delete previous file if exists
                        if ($oldFilePath && Storage::disk('public')->exists($oldFilePath)) {
                            Storage::disk('public')->delete($oldFilePath);
                            Log::info('Previous file deleted for school ID ' . $added->id . ': ' . $oldFilePath);
                        }
                    } catch (\Exception $e) {
                        Log::error('File update failed for school ID ' . $added->id . ': ' . $e->getMessage());
                        throw new \Exception('Fayl yangilashda xatolik: ' . $e->getMessage());
                    }
                } else {
                    // Don't overwrite existing file if no new file is uploaded
                    unset($data['maktab_rasmlari']);
                }

                $added->update($data);
                Log::info('Added record updated successfully: ID ' . $added->id);

                return redirect()->route('added')->with('success', 'Muvaffaqiyatli yangilandi!');
            });
        } catch (\Exception $e) {
            // Clean up new file if it was uploaded but record update failed
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
        $this->authorize('delete', $added);

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
