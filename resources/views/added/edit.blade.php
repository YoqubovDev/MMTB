<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTV - Maktabni Tahrirlash</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="font-inter bg-gray-50 min-h-screen flex flex-col">
<!-- Navbar -->
<nav class="bg-transparent text-white fixed top-0 w-full z-50 transition-all duration-300" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <div class="flex-shrink-0 flex items-center">
                <h1 class="text-4xl font-extrabold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-indigo-600">MTV</h1>
            </div>
            <div class="hidden md:flex space-x-12">
                <a href="{{ url('/') }}" class="relative text-lg font-semibold text-gray-100 hover:text-blue-300 transition-all duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-blue-300 after:transition-all after:duration-300 hover:after:w-full">Bosh sahifa</a>
                <a href="#" class="relative text-lg font-semibold text-gray-100 hover:text-blue-300 transition-all duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-blue-300 after:transition-all after:duration-300 hover:after:w-full">Yangiliklar</a>
                <a href="#" class="relative text-lg font-semibold text-gray-100 hover:text-blue-300 transition-all duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-blue-300 after:transition-all after:duration-300 hover:after:w-full">Hujjatlar</a>
                <a href="#" class="relative text-lg font-semibold text-gray-100 hover:text-blue-300 transition-all duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-blue-300 after:transition-all after:duration-300 hover:after:w-full">Bog'lanish</a>
            </div>
            <div class="hidden md:flex items-center gap-4">
                <a href="#" id="logoutBtn" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                    Chiqish
                </a>
            </div>
            <div class="md:hidden flex items-center">
                <button id="menuBtn" class="text-white focus:outline-none">
                    <i class="fas fa-bars text-3xl"></i>
                </button>
            </div>
        </div>
    </div>
    <div id="mobileMenu" class="hidden md:hidden bg-gradient-to-r from-blue-900 to-indigo-900 text-white px-6 py-8 animate-slide-in">
        <a href="{{ url('/') }}" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Bosh sahifa</a>
        <a href="#" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Yangiliklar</a>
        <a href="#" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Hujjatlar</a>
        <a href="#" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Bog'lanish</a>
        <a href="#" id="mobileLogoutBtn" class="block mt-6 bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold text-center hover:shadow-lg transition">Chiqish</a>
    </div>
</nav>

<!-- Main Content -->
<section class="flex-grow py-32 relative bg-gradient-to-br from-blue-50 via-white to-indigo-50">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80')] bg-cover bg-center opacity-10"></div>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-12 gap-4">
            <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600 animate-fade-in-up">
                Maktabni Tahrirlash
            </h2>
            <a href="{{ route('added') }}" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-4 rounded-full font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                <i class="fas fa-arrow-left mr-2"></i> Ortga
            </a>
        </div>

        <!-- Edit School Form -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 max-w-5xl mx-auto shadow-2xl animate-fade-in-up">
            <!-- Display validation errors -->
            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Display success message if any -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('added.update', $added->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="district_id" class="block text-gray-700 font-semibold mb-2">Tuman</label>
                        <select id="district_id" name="district_id" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300">
                            <option value="">Tumanni tanlang</option>
                            @foreach($districts as $district)
                                <option value="{{ $district->id }}" {{ old('district_id', $added->district_id) == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="mfy" class="block text-gray-700 font-semibold mb-2">Manzil (MFY)</label>
                        <input type="text" id="mfy" name="mfy" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O'zim toldirman" value="{{ old('mfy', $added->mfy) }}">
                    </div>
                    <div>
                        <label for="qurilgan_yili" class="block text-gray-700 font-semibold mb-2">Qurilgan yili</label>
                        <input type="number" id="qurilgan_yili" name="qurilgan_yili" min="1800" max="{{ date('Y') }}" value="{{ old('qurilgan_yili', $added->qurilgan_yili) }}" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 1995" required>
                    </div>
                    <div>
                        <label for="songi_tamir_yili" class="block text-gray-700 font-semibold mb-2">So'ngi tamirlangan yili</label>
                        <input type="number" id="songi_tamir_yili" name="songi_tamir_yili" min="1800" max="{{ date('Y') }}" value="{{ old('songi_tamir_yili', $added->songi_tamir_yili) }}" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 2020">
                    </div>
                    <div>
                        <label for="sektor_raqami" class="block text-gray-700 font-semibold mb-2">Sektor raqami</label>
                        <input type="number" id="sektor_raqami" name="sektor_raqami" min="0" value="{{ old('sektor_raqami', $added->sektor_raqami) }}" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 3">
                    </div>
                    <div>
                        <label for="yer_maydoni" class="block text-gray-700 font-semibold mb-2">Yer maydoni</label>
                        <input type="text" id="yer_maydoni" name="yer_maydoni" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 5000 m²" value="{{ old('yer_maydoni', $added->yer_maydoni) }}">
                    </div>
                    <div>
                        <label for="xudud_oralganligi" class="block text-gray-700 font-semibold mb-2">Xudud o'ralganligi</label>
                        <div class="flex items-center space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="xudud_oralganligi" value="1" {{ old('xudud_oralganligi', $added->xudud_oralganligi) == 1 ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
                                <span class="ml-2 text-gray-700">Ha</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="xudud_oralganligi" value="0" {{ old('xudud_oralganligi', $added->xudud_oralganligi) == 0 ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
                                <span class="ml-2 text-gray-700">Yo'q</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label for="binolar_soni" class="block text-gray-700 font-semibold mb-2">Binolar soni</label>
                        <input type="number" id="binolar_soni" name="binolar_soni" min="0" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 2" value="{{ old('binolar_soni', $added->binolar_soni) }}">
                    </div>
                    <div>
                        <label for="binolar_qavatligi" class="block text-gray-700 font-semibold mb-2">Binolar qavatligi</label>
                        <input type="number" id="binolar_qavatligi" name="binolar_qavatligi" min="1" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 3" value="{{ old('binolar_qavatligi', $added->binolar_qavatligi) }}">
                    </div>
                    <div>
                        <label for="binolar_maydoni" class="block text-gray-700 font-semibold mb-2">Binolar maydoni</label>
                        <input type="text" id="binolar_maydoni" name="binolar_maydoni" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 3000 m²" value="{{ old('binolar_maydoni', $added->binolar_maydoni) }}">
                    </div>
                    <div>
                        <label for="istilidigan_maydon" class="block text-gray-700 font-semibold mb-2">Istilidigan maydon</label>
                        <input type="text" id="istilidigan_maydon" name="istilidigan_maydon" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 2500 m²" value="{{ old('istilidigan_maydon', $added->istilidigan_maydon) }}">
                    </div>
                    <div>
                        <label for="quvvati" class="block text-gray-700 font-semibold mb-2">Quvvati</label>
                        <input type="text" id="quvvati" name="quvvati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 500 o'quvchi" value="{{ old('quvvati', $added->quvvati) }}">
                    </div>
                    <div>
                        <label for="oquvchi_soni" class="block text-gray-700 font-semibold mb-2">O'quvchi soni</label>
                        <input type="number" id="oquvchi_soni" name="oquvchi_soni" min="0" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 450" value="{{ old('oquvchi_soni', $added->oquvchi_soni) }}">
                    </div>
                    <div>
                        <label for="koffsiyent" class="block text-gray-700 font-semibold mb-2">Koffsiyent</label>
                        <input type="number" id="koffsiyent" name="koffsiyent" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 0.9" value="{{ old('koffsiyent', $added->koffsiyent) }}">
                    </div>
                    <div>
                        <label for="oshxona_yoki_bufet_quvvati" class="block text-gray-700 font-semibold mb-2">Oshxona yoki bufet quvvati</label>
                        <input type="text" id="oshxona_yoki_bufet_quvvati" name="oshxona_yoki_bufet_quvvati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 100 kishi" value="{{ old('oshxona_yoki_bufet_quvvati', $added->oshxona_yoki_bufet_quvvati) }}">
                    </div>
                    <div>
                        <label for="sport_zal_soni_va_maydoni" class="block text-gray-700 font-semibold mb-2">Sport zal soni va maydoni</label>
                        <input type="text" id="sport_zal_soni_va_maydoni" name="sport_zal_soni_va_maydoni" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 1, 200 m²" value="{{ old('sport_zal_soni_va_maydoni', $added->sport_zal_soni_va_maydoni) }}">
                    </div>
                    <div>
                        <label for="faollar_zali_va_quvvati" class="block text-gray-700 font-semibold mb-2">Faollar zali va quvvati</label>
                        <input type="text" id="faollar_zali_va_quvvati" name="faollar_zali_va_quvvati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 1, 150 kishi" value="{{ old('faollar_zali_va_quvvati', $added->faollar_zali_va_quvvati) }}">
                    </div>
                    <div>
                        <label for="xolati" class="block text-gray-700 font-semibold mb-2">Xolati</label>
                        <input type="text" id="xolati" name="xolati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: Yaxshi" value="{{ old('xolati', $added->xolati) }}">
                    </div>
                    <div>
                        <label for="tom_xolati_yuzda" class="block text-gray-700 font-semibold mb-2">Tom xolati % da</label>
                        <input type="number" id="tom_xolati_yuzda" name="tom_xolati_yuzda" min="0" max="100" step="0.01" value="{{ old('tom_xolati_yuzda', $added->tom_xolati_yuzda) }}" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 90">
                    </div>
                    <div>
                        <label for="deraza_rom_xolati_yuzda" class="block text-gray-700 font-semibold mb-2">Deraza rom xolati % da</label>
                        <input type="number" id="deraza_rom_xolati_yuzda" name="deraza_rom_xolati_yuzda" min="0" max="100" step="0.01" value="{{ old('deraza_rom_xolati_yuzda', $added->deraza_rom_xolati_yuzda) }}" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 85">
                    </div>
                    <div>
                        <label for="istish_turi" class="block text-gray-700 font-semibold mb-2">Istish turi</label>
                        <input type="text" id="istish_turi" name="istish_turi" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: Gaz" value="{{ old('istish_turi', $added->istish_turi) }}">
                    </div>
                    <div>
                        <label for="qozonlar_soni" class="block text-gray-700 font-semibold mb-2">Qozonlar soni</label>
                        <input type="number" id="qozonlar_soni" name="qozonlar_soni" min="0" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 2" value="{{ old('qozonlar_soni', $added->qozonlar_soni) }}">
                    </div>
                    <div>
                        <label for="qozonlar_xolati_yuzda" class="block text-gray-700 font-semibold mb-2">Qozonlar xolati % da</label>
                        <input type="number" id="qozonlar_xolati_yuzda" name="qozonlar_xolati_yuzda" min="0" max="100" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 80" value="{{ old('qozonlar_xolati_yuzda', $added->qozonlar_xolati_yuzda) }}">
                    </div>
                    <div>
                        <label for="apoklar_xolati_yuzda" class="block text-gray-700 font-semibold mb-2">Apoklar xolati % da</label>
                        <input type="number" id="apoklar_xolati_yuzda" name="apoklar_xolati_yuzda" min="0" max="100" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 75" value="{{ old('apoklar_xolati_yuzda', $added->apoklar_xolati_yuzda) }}">
                    </div>
                    <div>
                        <label for="gaz_istemoli" class="block text-gray-700 font-semibold mb-2">1 yillik o'rtacha gaz iste'moli</label>
                        <input type="text" id="gaz_istemoli" name="gaz_istemoli" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 5000 m³" value="{{ old('gaz_istemoli', $added->gaz_istemoli) }}">
                    </div>
                    <div>
                        <label for="elektr_istemoli" class="block text-gray-700 font-semibold mb-2">1 yillik o'rtacha elektr iste'moli</label>
                        <input type="text" id="elektr_istemoli" name="elektr_istemoli" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 10000 kVt" value="{{ old('elektr_istemoli', $added->elektr_istemoli) }}">
                    </div>
                    <div>
                        <label for="issiqlik_istemoli" class="block text-gray-700 font-semibold mb-2">1 yillik o'rtacha issiqlik iste'moli</label>
                        <input type="text" id="issiqlik_istemoli" name="issiqlik_istemoli" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 2000 Gkal" value="{{ old('issiqlik_istemoli', $added->issiqlik_istemoli) }}">
                    </div>
                    <div>
                        <label for="quyosh_paneli" class="block text-gray-700 font-semibold mb-2">Quyosh paneli</label>
                        <div class="flex items-center space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="quyosh_paneli" value="1" {{ old('quyosh_paneli', $added->quyosh_paneli) == 1 ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
                                <span class="ml-2 text-gray-700">Bor</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="quyosh_paneli" value="0" {{ old('quyosh_paneli', $added->quyosh_paneli) == 0 ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
                                <span class="ml-2 text-gray-700">Yo'q</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label for="geokollektor" class="block text-gray-700 font-semibold mb-2">Geokollektor</label>
                        <div class="flex items-center space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="geokollektor" value="1" {{ old('geokollektor', $added->geokollektor) == 1 ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
                                <span class="ml-2 text-gray-700">Bor</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="geokollektor" value="0" {{ old('geokollektor', $added->geokollektor) == 0 ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
                                <span class="ml-2 text-gray-700">Yo'q</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label for="maktab_rasmlari" class="block text-gray-700 font-semibold mb-2">Maktab rasmlari</label>
                        @if($added->maktab_rasmlari)
                            <div class="mb-3">
                                <img src="{{ Storage::url($added->maktab_rasmlari) }}" alt="Maktab rasmi" class="max-w-xs rounded-lg shadow-lg">
                                <p class="text-sm text-gray-600 mt-1">Mavjud rasm</p>
                            </div>
                        @endif
                        <input type="file" id="maktab_rasmlari" name="maktab_rasmlari" accept="image/jpeg,image/png,image/jpg,image/gif" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300">
                        <p class="text-gray-500 text-sm mt-1">JPEG, PNG, JPG yoki GIF formatida. Yangi rasm yuklamasangiz, mavjud rasm saqlanadi.</p>
                    </div>
                    <div>
                        <label for="lokatsiya" class="block text-gray-700 font-semibold mb-2">Lokatsiya</label>
                        <input type="text" id="lokatsiya" name="lokatsiya" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: Google Maps silka" value="{{ old('lokatsiya', $added->lokatsiya) }}">
                    </div>
                </div>
                <div class="flex justify-end gap-4 mt-8">
                    <a href="{{ route('added') }}" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-full font-semibold hover:bg-gray-300 transition-all duration-300">Bekor qilish</a>
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-full font-semibold shadow-lg hover:shadow-xl transition-all duration-300">Saqlash</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gradient-to-br from-blue-900 to-indigo-950 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-16">
            <div>
                <h3 class="text-3xl font-extrabold mb-6 bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-indigo-600">Maktabgacha Ta'lim</h3>
                <p class="text-gray-300 leading-relaxed">Bolalarimizning kelajagi uchun eng yaxshi ta'lim muhitini yaratamiz.</p>
            </div>
            <div>
                <h3 class="text-2xl font-semibold mb-6">Tez havolalar</h3>
                <ul class="space-y-4">
                    <li><a href="{{ url('/') }}" class="text-gray-300 hover:text-blue-300 hover:translate-x-2 transition-all duration-300">Bosh sahifa</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-blue-300 hover:translate-x-2 transition-all duration-300">Yangiliklar</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-blue-300 hover:translate-x-2 transition-all duration-300">Hujjatlar</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-blue-300 hover:translate-x-2 transition-all duration-300">Bog'lanish</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-2xl font-semibold mb-6">Bog'lanish</h3>
                <p class="text-gray-300 mb-4">Email: <a href="mailto:info@mtv.uz" class="hover:text-blue-300 transition">info@mtv.uz</a></p>
                <p class="text-gray-300 mb-4">Telefon: <a href="tel:+998711234567" class="hover:text-blue-300 transition">+998 71 123 45 67</a></p>
                <p class="text-gray-300">Manzil: Toshkent, Chilanzar, 45-uy</p>
            </div>
            <div>
                <h3 class="text-2xl font-semibold mb-6">Bizni kuzating</h3>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-300 hover:text-blue-300 text-3xl hover:scale-110 transition-transform duration-300"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-300 hover:text-blue-300 text-3xl hover:scale-110 transition-transform duration-300"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-300 hover:text-blue-300 text-3xl hover:scale-110 transition-transform duration-300"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-300 hover:text-blue-300 text-3xl hover:scale-110 transition-transform duration-300"><i class="fab fa-telegram"></i></a>
                </div>
            </div>
        </div>
        <div class="mt-16 text-center border-t border-blue-800 pt-8">
            <p class="text-gray-300">© 2025 Maktabgacha Ta'lim Vazirligi. Barcha huquqlar himoyalangan.</p>
        </div>
    </div>
</footer>

<!-- JavaScript -->
<script>
    // Navbar Scroll Effect
    window.addEventListener('scroll', () => {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('bg-gradient-to-r', 'from-blue-900', 'to-indigo-900', 'shadow-xl');
            navbar.classList.remove('bg-transparent');
        } else {
            navbar.classList.remove('bg-gradient-to-r', 'from-blue-900', 'to-indigo-900', 'shadow-xl');
            navbar.classList.add('bg-transparent');
        }
    });

    // Hamburger Menu Toggle
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        mobileMenu.classList.toggle('animate-slide-in');
    });
</script>

<!-- Custom Animation Styles -->
<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes slideIn {
        from { transform: translateY(-100%); }
        to { transform: translateY(0); }
    }
    .animate-fade-in-up { animation: fadeInUp 0.8s ease-out forwards; }
    .animate-slide-in { animation: slideIn 0.5s ease-out forwards; }
</style>
</body>
</html>
