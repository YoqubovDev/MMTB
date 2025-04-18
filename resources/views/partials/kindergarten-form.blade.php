<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <!-- Boqcha raqami -->
    <div>
        <label for="{{ $prefix }}kindergarten_number" class="block text-gray-700 font-semibold mb-2">Boqcha raqami</label>
        <input type="text" id="{{ $prefix }}kindergarten_number" name="boqcha_raqami" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('boqcha_raqami', $kindergarten->boqcha_raqami ?? '') }}" required aria-required="true">
        @error('boqcha_raqami')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Tuman -->
    <div>
        <label for="{{ $prefix }}district_id" class="block text-gray-700 font-semibold mb-2">Tuman</label>
        <select id="{{ $prefix }}district_id" name="district_id" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" required aria-required="true">
            <option value="">Tumanni tanlang</option>
            @foreach($districts as $district)
                <option value="{{ $district->id }}" {{ old('district_id', $kindergarten->district_id ?? '') == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
            @endforeach
        </select>
        @error('district_id')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Manzil (MFY) -->
    <div>
        <label for="{{ $prefix }}mfy" class="block text-gray-700 font-semibold mb-2">Manzil (MFY)</label>
        <input type="text" id="{{ $prefix }}mfy" name="mfy" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('mfy', $kindergarten->mfy ?? '') }}">
        @error('mfy')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Qurilgan yili -->
    <div>
        <label for="{{ $prefix }}qurilgan_yili" class="block text-gray-700 font-semibold mb-2">Qurilgan yili</label>
        <input type="number" id="{{ $prefix }}qurilgan_yili" name="qurilgan_yili" min="1800" max="{{ date('Y') }}" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('qurilgan_yili', $kindergarten->qurilgan_yili ?? '') }}" required aria-required="true">
        @error('qurilgan_yili')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- So'ngi tamirlangan yili -->
    <div>
        <label for="{{ $prefix }}songi_tamir_yili" class="block text-gray-700 font-semibold mb-2">So‘ngi tamirlangan yili</label>
        <input type="number" id="{{ $prefix }}songi_tamir_yili" name="songi_tamir_yili" min="1800" max="{{ date('Y') }}" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('songi_tamir_yili', $kindergarten->songi_tamir_yili ?? '') }}">
        @error('songi_tamir_yili')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Sektor raqami -->
    <div>
        <label for="{{ $prefix }}sektor_raqami" class="block text-gray-700 font-semibold mb-2">Sektor raqami</label>
        <input type="number" id="{{ $prefix }}sektor_raqami" name="sektor_raqami" min="0" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('sektor_raqami', $kindergarten->sektor_raqami ?? '') }}">
        @error('sektor_raqami')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Yer maydoni -->
    <div>
        <label for="{{ $prefix }}yer_maydoni" class="block text-gray-700 font-semibold mb-2">Yer maydoni (m²)</label>
        <input type="text" id="{{ $prefix }}yer_maydoni" name="yer_maydoni" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('yer_maydoni', $kindergarten->yer_maydoni ?? '') }}" placeholder="Masalan, 1000 m²">
        @error('yer_maydoni')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Xudud o'ralganligi -->
    <div>
        <fieldset>
            <legend class="block text-gray-700 font-semibold mb-2">Xudud o‘ralganligi</legend>
            <div class="flex items-center space-x-4">
                <label class="inline-flex items-center">
                    <input type="radio" name="xudud_oralganligi" value="1" {{ old('xudud_oralganligi', $kindergarten->xudud_oralganligi ?? 0) == 1 ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
                    <span class="ml-2 text-gray-700">Ha</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="xudud_oralganligi" value="0" {{ old('xudud_oralganligi', $kindergarten->xudud_oralganligi ?? 0) == 0 ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
                    <span class="ml-2 text-gray-700">Yo‘q</span>
                </label>
            </div>
        </fieldset>
        @error('xudud_oralganligi')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Binolar soni -->
    <div>
        <label for="{{ $prefix }}binolar_soni" class="block text-gray-700 font-semibold mb-2">Binolar soni</label>
        <input type="number" id="{{ $prefix }}binolar_soni" name="binolar_soni" min="0" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('binolar_soni', $kindergarten->binolar_soni ?? '') }}">
        @error('binolar_soni')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Binolar qavatligi -->
    <div>
        <label for="{{ $prefix }}binolar_qavatligi" class="block text-gray-700 font-semibold mb-2">Binolar qavatligi</label>
        <input type="number" id="{{ $prefix }}binolar_qavatligi" name="binolar_qavatligi" min="1" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('binolar_qavatligi', $kindergarten->binolar_qavatligi ?? '') }}">
        @error('binolar_qavatligi')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Binolar maydoni -->
    <div>
        <label for="{{ $prefix }}binolar_maydoni" class="block text-gray-700 font-semibold mb-2">Binolar maydoni (m²)</label>
        <input type="text" id="{{ $prefix }}binolar_maydoni" name="binolar_maydoni" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('binolar_maydoni', $kindergarten->binolar_maydoni ?? '') }}" placeholder="Masalan, 500 m²">
        @error('binolar_maydoni')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Istilidigan maydon -->
    <div>
        <label for="{{ $prefix }}istilidigan_maydon" class="block text-gray-700 font-semibold mb-2">Istilidigan maydon (m²)</label>
        <input type="text" id="{{ $prefix }}istilidigan_maydon" name="istilidigan_maydon" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('istilidigan_maydon', $kindergarten->istilidigan_maydon ?? '') }}" placeholder="Masalan, 400 m²">
        @error('istilidigan_maydon')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Quvvati -->
    <div>
        <label for="{{ $prefix }}quvvati" class="block text-gray-700 font-semibold mb-2">Quvvati</label>
        <input type="text" id="{{ $prefix }}quvvati" name="quvvati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('quvvati', $kindergarten->quvvati ?? '') }}" placeholder="Masalan, 100 o‘rin">
        @error('quvvati')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- O‘quvchi soni -->
    <div>
        <label for="{{ $prefix }}oquvchi_soni" class="block text-gray-700 font-semibold mb-2">O‘quvchi soni</label>
        <input type="number" id="{{ $prefix }}oquvchi_soni" name="oquvchi_soni" min="0" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('oquvchi_soni', $kindergarten->oquvchi_soni ?? '') }}">
        @error('oquvchi_soni')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Koffsiyent -->
    <div>
        <label for="{{ $prefix }}koffsiyent" class="block text-gray-700 font-semibold mb-2">Koffsiyent</label>
        <input type="number" id="{{ $prefix }}koffsiyent" name="koffsiyent" step="0.01" min="0" max="10" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('koffsiyent', $kindergarten->koffsiyent ?? '') }}">
        @error('koffsiyent')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Oshxona yoki bufet quvvati -->
    <div>
        <label for="{{ $prefix }}oshxona_yoki_bufet_quvvati" class="block text-gray-700 font-semibold mb-2">Oshxona yoki bufet quvvati</label>
        <input type="text" id="{{ $prefix }}oshxona_yoki_bufet_quvvati" name="oshxona_yoki_bufet_quvvati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('oshxona_yoki_bufet_quvvati', $kindergarten->oshxona_yoki_bufet_quvvati ?? '') }}" placeholder="Masalan, 50 o‘rin">
        @error('oshxona_yoki_bufet_quvvati')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Sport zal soni va maydoni -->
    <div>
        <label for="{{ $prefix }}sport_zal_soni_va_maydoni" class="block text-gray-700 font-semibold mb-2">Sport zal soni va maydoni</label>
        <input type="text" id="{{ $prefix }}sport_zal_soni_va_maydoni" name="sport_zal_soni_va_maydoni" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('sport_zal_soni_va_maydoni', $kindergarten->sport_zal_soni_va_maydoni ?? '') }}" placeholder="Masalan, 1 zal, 100 m²">
        @error('sport_zal_soni_va_maydoni')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Faollar zali va quvvati -->
    <div>
        <label for="{{ $prefix }}faollar_zali_va_quvvati" class="block text-gray-700 font-semibold mb-2">Faollar zali va quvvati</label>
        <input type="text" id="{{ $prefix }}faollar_zali_va_quvvati" name="faollar_zali_va_quvvati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('faollar_zali_va_quvvati', $kindergarten->faollar_zali_va_quvvati ?? '') }}" placeholder="Masalan, 1 zal, 50 o‘rin">
        @error('faollar_zali_va_quvvati')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Xolati -->
    <div>
        <label for="{{ $prefix }}xolati" class="block text-gray-700 font-semibold mb-2">Xolati</label>
        <input type="text" id="{{ $prefix }}xolati" name="xolati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('xolati', $kindergarten->xolati ?? '') }}" placeholder="Masalan, Yaxshi">
        @error('xolati')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Tom xolati % da -->
    <div>
        <label for="{{ $prefix }}tom_xolati_yuzda" class="block text-gray-700 font-semibold mb-2">Tom xolati (%)</label>
        <input type="number" id="{{ $prefix }}tom_xolati_yuzda" name="tom_xolati_yuzda" min="0" max="100" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('tom_xolati_yuzda', $kindergarten->tom_xolati_yuzda ?? '') }}">
        @error('tom_xolati_yuzda')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Deraza rom xolati % da -->
    <div>
        <label for="{{ $prefix }}deraza_rom_xolati_yuzda" class="block text-gray-700 font-semibold mb-2">Deraza rom xolati (%)</label>
        <input type="number" id="{{ $prefix }}deraza_rom_xolati_yuzda" name="deraza_rom_xolati_yuzda" min="0" max="100" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('deraza_rom_xolati_yuzda', $kindergarten->deraza_rom_xolati_yuzda ?? '') }}">
        @error('deraza_rom_xolati_yuzda')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Istish turi -->
    <div>
        <label for="{{ $prefix }}istish_turi" class="block text-gray-700 font-semibold mb-2">Istish turi</label>
        <input type="text" id="{{ $prefix }}istish_turi" name="istish_turi" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('istish_turi', $kindergarten->istish_turi ?? '') }}" placeholder="Masalan, Gaz">
        @error('istish_turi')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Qozonlar soni -->
    <div>
        <label for="{{ $prefix }}qozonlar_soni" class="block text-gray-700 font-semibold mb-2">Qozonlar soni</label>
        <input type="number" id="{{ $prefix }}qozonlar_soni" name="qozonlar_soni" min="0" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('qozonlar_soni', $kindergarten->qozonlar_soni ?? '') }}">
        @error('qozonlar_soni')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Qozonlar xolati % da -->
    <div>
        <label for="{{ $prefix }}qozonlar_xolati_yuzda" class="block text-gray-700 font-semibold mb-2">Qozonlar xolati (%)</label>
        <input type="number" id="{{ $prefix }}qozonlar_xolati_yuzda" name="qozonlar_xolati_yuzda" min="0" max="100" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('qozonlar_xolati_yuzda', $kindergarten->qozonlar_xolati_yuzda ?? '') }}">
        @error('qozonlar_xolati_yuzda')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Apoklar xolati % da -->
    <div>
        <label for="{{ $prefix }}apoklar_xolati_yuzda" class="block text-gray-700 font-semibold mb-2">Apoklar xolati (%)</label>
        <input type="number" id="{{ $prefix }}apoklar_xolati_yuzda" name="apoklar_xolati_yuzda" min="0" max="100" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('apoklar_xolati_yuzda', $kindergarten->apoklar_xolati_yuzda ?? '') }}">
        @error('apoklar_xolati_yuzda')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Gaz iste’moli -->
    <div>
        <label for="{{ $prefix }}gaz_istemoli" class="block text-gray-700 font-semibold mb-2">1 yillik o‘rtacha gaz iste’moli (m³)</label>
        <input type="text" id="{{ $prefix }}gaz_istemoli" name="gaz_istemoli" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('gaz_istemoli', $kindergarten->gaz_istemoli ?? '') }}" placeholder="Masalan, 1000 m³">
        @error('gaz_istemoli')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Elektr iste’moli -->
    <div>
        <label for="{{ $prefix }}elektr_istemoli" class="block text-gray-700 font-semibold mb-2">1 yillik o‘rtacha elektr iste’moli (kVt/soat)</label>
        <input type="text" id="{{ $prefix }}elektr_istemoli" name="elektr_istemoli" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('elektr_istemoli', $kindergarten->elektr_istemoli ?? '') }}" placeholder="Masalan, 5000 kVt/soat">
        @error('elektr_istemoli')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Issiqlik iste’moli -->
    <div>
        <label for="{{ $prefix }}issiqlik_istemoli" class="block text-gray-700 font-semibold mb-2">1 yillik o‘rtacha issiqlik iste’moli (Gkal)</label>
        <input type="text" id="{{ $prefix }}issiqlik_istemoli" name="issiqlik_istemoli" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('issiqlik_istemoli', $kindergarten->issiqlik_istemoli ?? '') }}" placeholder ?????????
        <label for="{{ $prefix }}issiqlik_istemoli" class="block text-gray-700 font-semibold mb-2">1 yillik o‘rtacha issiqlik iste’moli (Gkal)</label>
        <input type="text" id="{{ $prefix }}issiqlik_istemoli" name="issiqlik_istemoli" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('issiqlik_istemoli', $kindergarten->issiqlik_istemoli ?? '') }}" placeholder="Masalan, 200 Gkal">
        @error('issiqlik_istemoli')
        <p class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <!-- Quyosh paneli -->
    <div>
        <fieldset>
            <legend class="block text-gray-700 font-semibold mb-2">Quyosh paneli</legend>
            <div class="flex items-center space-x-4">
                <label class="inline-flex items-center">
                    <input type="radio" name="quyosh_paneli" value="1" {{ old('quyosh_paneli', $kindergarten->quyosh_paneli ?? 0) == 1 ? 'checked
