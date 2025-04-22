<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\District;
use App\Http\Requests\AddedRequest;
    use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{

    public function school(Request $request)
    {
        $districts = District::where('status', true)->get();
        $district_id = $_GET['added'] ?? $districts[0]['id'] ?? null;
        $addeds = $district_id ? School::where('district_id', $district_id)->with('district')->get() : collect();

        return view('added', compact('districts', 'addeds'));
    }

    public function search(Request $request)
    {
        $search = $request->query('search', '');
        $district = $request->query('district', '');

        $query = School::query()
            ->when($search, fn($q) => $q->where('boqcha_raqami', 'like', "%{$search}%"))
            ->when($district, fn($q) => $q->whereHas('district', fn($q) => $q->where('name', $district)))
            ->with('district');

        return response()->json($query->get());
    }

    public function create()
    {
        $districts = District::where('status', true)->get();
        return view('schools.create', compact('districts'));
    }


    public function store(Request $request)
    {
        try {
            Log::info('school store method called');
            Log::info('Request data: ' . json_encode($request->all()));


            $validated = $request->validate([
                'district_id' => 'nullable|exists:districts,id',
                'mfy' => 'required|string|max:255',
                'qurilgan_yili' => 'required|integer|min:1800|max:' . date('Y'),
            ]);

            Log::info('Validation passed');

            // Create the record with minimal required fields
            $school = new School();
            $school->district_id = $request->district_id;
            $school->mfy = $request->mfy;
            $school->qurilgan_yili = $request->qurilgan_yili;

            // Set other fields if provided
            if ($request->has('songi_tamir_yili')) $school->songi_tamir_yili = $request->songi_tamir_yili;
            if ($request->has('maktab_raqami')) $school->maktab_raqami = $request->maktab_raqami;
            if ($request->has('yer_maydoni')) $school->yer_maydoni = $request->yer_maydoni;
            if ($request->has('xudud_oralganligi')) $school->xudud_oralganligi = $request->xudud_oralganligi;
            if ($request->has('binolar_soni')) $school->binolar_soni = $request->binolar_soni;
            if ($request->has('binolar_qavatligi')) $school->binolar_qavatligi = $request->binolar_qavatligi;
            if ($request->has('binolar_maydoni')) $school->binolar_maydoni = $request->binolar_maydoni;
            if ($request->has('istilidigan_maydon')) $school->istilidigan_maydon = $request->istilidigan_maydon;
            if ($request->has('quvvati')) $school->quvvati = $request->quvvati;
            if ($request->has('oquvchilar_soni')) $school->bolalar_soni = $request->bolalar_soni;
            if ($request->has('koffsiyent')) $school->koffsiyent = $request->koffsiyent;
            if ($request->has('oshxona_yoki_bufet_quvvati')) $school->oshxona_yoki_bufet_quvvati = $request->oshxona_yoki_bufet_quvvati;
            if ($request->has('sport_zal_soni_va_maydoni')) $school->sport_zal_soni_va_maydoni = $request->sport_zal_soni_va_maydoni;
            if ($request->has('faollar_zali_va_quvvati')) $school->faollar_zali_va_quvvati = $request->faollar_zali_va_quvvati;
            if ($request->has('xolati')) $school->xolati = $request->xolati;
            if ($request->has('tom_xolati_yuzda')) $school->tom_xolati_yuzda = $request->tom_xolati_yuzda;
            if ($request->has('deraza_rom_xolati_yuzda')) $school->deraza_rom_xolati_yuzda = $request->deraza_rom_xolati_yuzda;
            if ($request->has('istish_turi')) $school->istish_turi = $request->istish_turi;
            if ($request->has('qozonlar_soni')) $school->qozonlar_soni = $request->qozonlar_soni;
            if ($request->has('qozonlar_xolati_yuzda')) $school->qozonlar_xolati_yuzda = $request->qozonlar_xolati_yuzda;
            if ($request->has('apoklar_xolati_yuzda')) $school->apoklar_xolati_yuzda = $request->apoklar_xolati_yuzda;
            if ($request->has('gaz_istemoli')) $school->gaz_istemoli = $request->gaz_istemoli;
            if ($request->has('elektr_istemoli')) $school->elektr_istemoli = $request->elektr_istemoli;
            if ($request->has('issiqlik_istemoli')) $school->issiqlik_istemoli = $request->issiqlik_istemoli;
            if ($request->has('quyosh_paneli')) $school->quyosh_paneli = $request->quyosh_paneli;
            if ($request->has('geokollektor')) $school->geokollektor = $request->geokollektor;
            if ($request->has('lokatsiya')) $school->lokatsiya = $request->lokatsiya;

            // Handle file upload
            if ($request->hasFile('maktab_rasmlari')) {
                $file = $request->file('maktab_rasmlari');
                if ($file->isValid()) {
                    $path = $file->store('school_images', 'public');
                    $school->maktab_rasmlari = $path;
                    Log::info('File uploaded to: ' . $path);
                }
            }

            // Save the kindergarten
            $saved = $school->save();
            Log::info('School saved: ' . ($saved ? 'Yes' : 'No'));

            if ($saved) {
                return redirect()->back()->with('success', "Boqcha muvaffaqiyatli qo'shildi.");
            } else {
                Log::error('Failed to save kindergarten');
                return redirect()->back()->with('error', "Boqcha qo'shishda xatolik yuz berdi.");
            }

        } catch (\Exception $e) {
            Log::error('Exception in kindergarten store: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return redirect()->back()->with('error', 'Xatolik: ' . $e->getMessage());
        }
    }


    public function show(School $added)
    {
        $added->load('district');
        return view('schools.show', compact('added'));
    }

    public function edit(School $added): View
    {
        $districts = District::where('status', true)->get();
        return view('schools.edit', compact('added', 'districts'));
    }


    public function update(AddedRequest $request, School $added): RedirectResponse
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
                Log::info('School record updated successfully: ID ' . $added->id);

                return redirect()->route('added')->with('success', 'Muvaffaqiyatli yangilandi!');
            });
        } catch (\Exception $e) {
            if (isset($newFilePath) && Storage::disk('public')->exists($newFilePath)) {
                Storage::disk('public')->delete($newFilePath);
                Log::info('Deleted new file after failed school update: ' . $newFilePath);
            }

            Log::error('Error updating School record for ID ' . $added->id . ': ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Ma\'lumotlarni yangilashda xatolik: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified school from storage.
     *
     * @param  \App\Models\School  $added
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(School $added): RedirectResponse
    {

        try {
            return DB::transaction(function () use ($added) {
                if ($added->maktab_rasmlari && Storage::disk('public')->exists($added->maktab_rasmlari)) {
                    Storage::disk('public')->delete($added->maktab_rasmlari);
                    Log::info('File deleted with record: ' . $added->maktab_rasmlari);
                }

                $added->delete();
                Log::info('School record deleted successfully: ID ' . $added->id);

                return redirect()->route('added')->with('success', 'Muvaffaqiyatli o\'chirildi!');
            }, 5);
        } catch (\Exception $e) {
            Log::error('Error deleting School record: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Ma\'lumotlarni o\'chirishda xatolik: ' . $e->getMessage()]);
        }
    }
}
