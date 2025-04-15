<?php

namespace App\Http\Controllers;

use App\Models\Added;
use Illuminate\Http\Request;

class AddedController extends Controller
{
    public function index()
    {
        $addeds = Added::all();
        return view('added.index', compact('addeds'));
    }

    public function create()
    {
        return view('added.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mfy' => 'nullable|string',
            'qurilgan_yili' => 'nullable|digits:4|integer',
            'songi_tamir_yili' => 'nullable|digits:4|integer',
            'sektor_raqami' => 'nullable|integer',
            'yer_maydoni' => 'nullable|numeric',
            'xudud_oralganligi' => 'nullable|boolean',
            'binolar_soni' => 'nullable|integer',
            'binolar_qavatligi' => 'nullable|integer',
            'binolar_maydoni' => 'nullable|numeric',
            'istilidigan_maydon' => 'nullable|numeric',
            'quvvati' => 'nullable|integer',
            'oquvchi_soni' => 'nullable|integer',
            'koffsiyent' => 'nullable|numeric',
            'oshxona_yoki_bufet_quvvati' => 'nullable|integer',
            'sport_zal_soni_va_maydoni' => 'nullable|string',
            'faollar_zali_va_quvvati' => 'nullable|string',
            'xolati' => 'nullable|string',
            'tom_xolati_yuzda' => 'nullable|numeric',
            'deraza_rom_xolati_yuzda' => 'nullable|numeric',
            'istish_turi' => 'nullable|string',
            'qozonlar_soni' => 'nullable|integer',
            'qozonlar_xolati_yuzda' => 'nullable|numeric',
            'apoklar_xolati_yuzda' => 'nullable|numeric',
            'gaz_istemoli' => 'nullable|numeric',
            'elektr_istemoli' => 'nullable|numeric',
            'issiqlik_istemoli' => 'nullable|numeric',
            'quyosh_paneli' => 'nullable|boolean',
            'geokollektor' => 'nullable|boolean',
            'lokatsiya' => 'nullable|string',
        ]);

        Added::create($validated);
        return redirect()->route('added.index')->with('success', 'Muvaffaqiyatli saqlandi!');
    }

    public function show(Added $added)
    {
        return view('added.show', compact('added'));
    }

    public function edit(Added $added)
    {
        return view('added.edit', compact('added'));
    }

    public function update(Request $request, Added $added)
    {
        $validated = $request->validate([
            // validerlar xuddi store() dagidek
        ]);

        $added->update($validated);
        return redirect()->route('added.index')->with('success', 'Muvaffaqiyatli yangilandi!');
    }

    public function destroy(Added $added)
    {
        $added->delete();
        return redirect()->route('added.index')->with('success', 'O‘chirildi!');
    }
}
