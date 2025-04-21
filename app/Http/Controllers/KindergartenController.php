<?php

namespace App\Http\Controllers;

use App\Http\Requests\KindergartenRequest;
use App\Models\Kindergarten;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class KindergartenController extends Controller
{
    public function kindergarten()
    {
        $districts = District::where('status', true)->get();
        $district_id = $_GET['kindergarten'] ?? $districts[0]['id'] ?? null;
        $kindergartens = Kindergarten::where('district_id', $district_id)->with('district')->get();

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

    public function create()
    {
        $districts = District::where('status', true)->get();
        return view('kindergarten.create', compact('districts'));
    }

    public function store(Request $request)
    {
        try {
            Log::info('Kindergarten store method called');
            Log::info('Request data: ' . json_encode($request->all()));

            // Validation
            $validated = $request->validate([
                'district_id' => 'nullable|exists:districts,id',
                'mfy' => 'required|string|max:255',
                'qurilgan_yili' => 'required|integer|min:1800|max:' . date('Y'),
            ]);

            Log::info('Validation passed');

            // Create the record with minimal required fields
            $kindergarten = new Kindergarten();
            $kindergarten->district_id = $request->district_id;
            $kindergarten->mfy = $request->mfy;
            $kindergarten->qurilgan_yili = $request->qurilgan_yili;

            // Set other fields if provided
            if ($request->has('songi_tamir_yili')) $kindergarten->songi_tamir_yili = $request->songi_tamir_yili;
            if ($request->has('sektor_raqami')) $kindergarten->sektor_raqami = $request->sektor_raqami;
            if ($request->has('yer_maydoni')) $kindergarten->yer_maydoni = $request->yer_maydoni;
            if ($request->has('xudud_oralganligi')) $kindergarten->xudud_oralganligi = $request->xudud_oralganligi;
            if ($request->has('binolar_soni')) $kindergarten->binolar_soni = $request->binolar_soni;
            if ($request->has('binolar_qavatligi')) $kindergarten->binolar_qavatligi = $request->binolar_qavatligi;
            if ($request->has('binolar_maydoni')) $kindergarten->binolar_maydoni = $request->binolar_maydoni;
            if ($request->has('istilidigan_maydon')) $kindergarten->istilidigan_maydon = $request->istilidigan_maydon;
            if ($request->has('quvvati')) $kindergarten->quvvati = $request->quvvati;
            if ($request->has('bolalar_soni')) $kindergarten->bolalar_soni = $request->bolalar_soni;
            if ($request->has('koffsiyent')) $kindergarten->koffsiyent = $request->koffsiyent;
            if ($request->has('oshxona_yoki_bufet_quvvati')) $kindergarten->oshxona_yoki_bufet_quvvati = $request->oshxona_yoki_bufet_quvvati;
            if ($request->has('sport_zal_soni_va_maydoni')) $kindergarten->sport_zal_soni_va_maydoni = $request->sport_zal_soni_va_maydoni;
            if ($request->has('faollar_zali_va_quvvati')) $kindergarten->faollar_zali_va_quvvati = $request->faollar_zali_va_quvvati;
            if ($request->has('xolati')) $kindergarten->xolati = $request->xolati;
            if ($request->has('tom_xolati_yuzda')) $kindergarten->tom_xolati_yuzda = $request->tom_xolati_yuzda;
            if ($request->has('deraza_rom_xolati_yuzda')) $kindergarten->deraza_rom_xolati_yuzda = $request->deraza_rom_xolati_yuzda;
            if ($request->has('istish_turi')) $kindergarten->istish_turi = $request->istish_turi;
            if ($request->has('qozonlar_soni')) $kindergarten->qozonlar_soni = $request->qozonlar_soni;
            if ($request->has('qozonlar_xolati_yuzda')) $kindergarten->qozonlar_xolati_yuzda = $request->qozonlar_xolati_yuzda;
            if ($request->has('apoklar_xolati_yuzda')) $kindergarten->apoklar_xolati_yuzda = $request->apoklar_xolati_yuzda;
            if ($request->has('gaz_istemoli')) $kindergarten->gaz_istemoli = $request->gaz_istemoli;
            if ($request->has('elektr_istemoli')) $kindergarten->elektr_istemoli = $request->elektr_istemoli;
            if ($request->has('issiqlik_istemoli')) $kindergarten->issiqlik_istemoli = $request->issiqlik_istemoli;
            if ($request->has('quyosh_paneli')) $kindergarten->quyosh_paneli = $request->quyosh_paneli;
            if ($request->has('geokollektor')) $kindergarten->geokollektor = $request->geokollektor;
            if ($request->has('lokatsiya')) $kindergarten->lokatsiya = $request->lokatsiya;

            // Handle file upload
            if ($request->hasFile('boqcha_rasmlari')) {
                $file = $request->file('boqcha_rasmlari');
                if ($file->isValid()) {
                    $path = $file->store('kindergarten_images', 'public');
                    $kindergarten->boqcha_rasmlari = $path;
                    Log::info('File uploaded to: ' . $path);
                }
            }

            // Save the kindergarten
            $saved = $kindergarten->save();
            Log::info('Kindergarten saved: ' . ($saved ? 'Yes' : 'No'));

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

    public function show(Kindergarten $kindergarten)
    {
        $kindergarten->load('district');
        return view('kindergarten.show', compact('kindergarten'));
    }

    public function update(KindergartenRequest $request, Kindergarten $kindergarten)
    {
        try {
            $data = $request->validated();

            // Handle file upload
            if ($request->hasFile('boqcha_rasmlari')) {
                // Delete old file if exists
                if ($kindergarten->boqcha_rasmlari && Storage::disk('public')->exists($kindergarten->boqcha_rasmlari)) {
                    Storage::disk('public')->delete($kindergarten->boqcha_rasmlari);
                }

                // Store new file
                $data['boqcha_rasmlari'] = $request->file('boqcha_rasmlari')->store('kindergarten_images', 'public');
            } else {
                unset($data['boqcha_rasmlari']);
            }

            // Update the kindergarten
            $kindergarten->update($data);

            return redirect()->route('kindergarten')->with('success', 'Muvaffaqiyatli yangilandi!');
        } catch (\Exception $e) {
            Log::error('Error updating kindergarten: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Xatolik: ' . $e->getMessage());
        }
    }

    public function destroy(Kindergarten $kindergarten)
    {
        // Delete file if exists
        if ($kindergarten->boqcha_rasmlari && Storage::disk('public')->exists($kindergarten->boqcha_rasmlari)) {
            Storage::disk('public')->delete($kindergarten->boqcha_rasmlari);
        }

        $kindergarten->delete();
        return redirect()->back()->with('success', "Boqcha muvaffaqiyatli o'chirildi.");
    }
}
