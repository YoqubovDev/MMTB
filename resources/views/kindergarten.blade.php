<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTV - <?php echo htmlspecialchars(ucfirst($_GET['district'] ?? 'Tuman')); ?> Bog‘chalari</title>
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
                <a href="/" class="text-4xl font-extrabold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-indigo-600">MTV</a>
            </div>
            <div class="hidden md:flex space-x-12">
                <a href="/" class="relative text-lg font-semibold text-gray-100 hover:text-blue-300 transition-all duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-blue-300 after:transition-all after:duration-300 hover:after:w-full">Bosh sahifa</a>
                <a href="#" class="relative text-lg font-semibold text-gray-100 hover:text-blue-300 transition-all duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-blue-300 after:transition-all after:duration-300 hover:after:w-full">Yangiliklar</a>
                <a href="#" class="relative text-lg font-semibold text-gray-100 hover:text-blue-300 transition-all duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-blue-300 after:transition-all after:duration-300 hover:after:w-full">Hujjatlar</a>
                <a href="#" class="relative text-lg font-semibold text-gray-100 hover:text-blue-300 transition-all duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-blue-300 after:transition-all after:duration-300 hover:after:w-full">Bog‘lanish</a>
            </div>
            <div class="hidden md:flex items-center gap-4">
                @auth
                    <a href="#" id="logoutBtn" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                        Chiqish
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                        Kirish
                    </a>
                @endauth
            </div>
            <div class="md:hidden flex items-center">
                <button id="menuBtn" class="text-white focus:outline-none">
                    <i class="fas fa-bars text-3xl"></i>
                </button>
            </div>
        </div>
    </div>
    <div id="mobileMenu" class="hidden md:hidden bg-gradient-to-r from-blue-900 to-indigo-900 text-white px-6 py-8 animate-slide-in">
        <a href="/" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Bosh sahifa</a>
        <a href="#" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Yangiliklar</a>
        <a href="#" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Hujjatlar</a>
        <a href="#" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Bog‘lanish</a>
        @auth
            <a href="#" id="mobileLogoutBtn" class="block mt-6 bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold text-center hover:shadow-lg transition">Chiqish</a>
        @else
            <a href="{{ route('login') }}" class="block mt-6 bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold text-center hover:shadow-lg transition">Kirish</a>
        @endauth
    </div>
</nav>

<!-- Main Content -->
<section class="flex-grow py-32 relative bg-gradient-to-br from-blue-50 via-white to-indigo-50">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80')] bg-cover bg-center opacity-10"></div>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-12 gap-4">
            <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600 animate-fade-in-up">
                <?php echo htmlspecialchars(ucfirst($_GET['district'] ?? 'Tuman')); ?> Bog‘chalari
            </h2>
            @auth
                <button onclick="document.getElementById('addKindergartenModal').classList.remove('hidden')" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-4 rounded-full font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                    <i class="fas fa-plus mr-2"></i> Bog‘cha Qo‘shish
                </button>
            @endauth
        </div>
        <div class="flex justify-center mb-12">
            <div class="relative w-full max-w-md">
                <form method="GET" action="">
                    <input type="hidden" name="district" value="<?php echo htmlspecialchars($_GET['district'] ?? ''); ?>">
                    <input type="text" name="search" placeholder="Bog‘cha qidirish..." class="w-full px-6 py-4 rounded-full bg-white text-gray-900 border-2 border-blue-200 focus:border-blue-600 focus:outline-none shadow-lg transition-all duration-300" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
                    <button type="submit" class="absolute right-6 top-1/2 transform -translate-y-1/2 text-blue-600">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
        <!-- Kindergartens List -->
        <div id="kindergartensList" class="space-y-6">
            @forelse($kindergartens as $kindergarten)
                <div class="flex flex-col sm:flex-row items-center p-6 bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 w-full">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mr-0 sm:mr-6 mb-4 sm:mb-0">
                        <i class="fas fa-school text-white text-2xl"></i>
                    </div>
                    <div class="flex-1 text-center sm:text-left">
                        <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ $kindergarten->boqcha_raqami }}-bog‘cha</h4>
                        <p class="text-gray-600">MFY: {{ $kindergarten->mfy ?? 'Ma\'lumot yo\'q' }}</p>
                        <p class="text-gray-600">Qurilgan yili: {{ $kindergarten->qurilgan_yili ?? 'Ma\'lumot yo\'q' }}</p>
                        <p class="text-gray-600">Tuman: {{ $kindergarten->district->name ?? 'Ma\'lumot yo\'q' }}</p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3 mt-4 sm:mt-0">
                        <a href="{{ route('kinder_data', $kindergarten->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 transition-all duration-300 text-center">
                            <i class="fas fa-eye"></i> Ko‘rish
                        </a>
                        @auth
                            <a href="javascript:void(0)" onclick="document.getElementById('editKindergartenModal-{{ $kindergarten->id }}').classList.remove('hidden')" class="bg-yellow-500 text-white px-4 py-2 rounded-full hover:bg-yellow-600 transition-all duration-300 text-center">
                                <i class="fas fa-edit"></i> Tahrirlash
                            </a>
                            <form method="POST" action="{{ route('kindergarten.destroy', $kindergarten->id) }}" onsubmit="return confirm('Rostdan o\'chirmoqchimisiz?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition-all duration-300">
                                    <i class="fas fa-trash"></i> O‘chirish
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>
            @empty
                <div class="flex flex-col items-center p-6 bg-white rounded-3xl shadow-lg w-full">
                    <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-school text-gray-400 text-2xl"></i>
                    </div>
                    <p class="text-gray-600 text-lg">Bog‘chalar topilmadi</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Modal for Adding Kindergarten -->
<div id="addKindergartenModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-3xl p-6 sm:p-8 max-w-3xl w-full mx-4 sm:mx-auto shadow-2xl animate-fade-in-up overflow-y-auto max-h-[80vh]">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Yangi Bog‘cha Qo‘shish</h3>
        <form method="POST" action="{{ route('kindergarten.store') }}" enctype="multipart/form-data">
            @csrf
            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="boqcha_raqami" class="block text-gray-700 font-semibold mb-2">Bog‘cha raqami</label>
                    <input type="text" id="boqcha_raqami" name="boqcha_raqami" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 112" value="{{ old('boqcha_raqami') }}" required>
                </div>
                <div>
                    <label for="district_id" class="block text-gray-700 font-semibold mb-2">Tuman</label>
                    <select id="district_id" name="district_id" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300">
                        <option value="">Tumanni tanlang</option>
                        @if(isset($districts))
                            @foreach($districts as $district)
                                <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                            @endforeach
                        @else
                            <option value="">No districts available</option>
                        @endif
                    </select>
                </div>
                <div>
                    <label for="mfy" class="block text-gray-700 font-semibold mb-2">Manzil (MFY)</label>
                    <input type="text" id="mfy" name="mfy" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman" value="{{ old('mfy') }}" required>
                </div>
                <div>
                    <label for="qurilgan_yili" class="block text-gray-700 font-semibold mb-2">Qurilgan yili</label>
                    <input type="number" id="qurilgan_yili" name="qurilgan_yili" min="1800" max="{{ date('Y') }}" value="{{ old('qurilgan_yili') }}" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 1995" required>
                </div>
                <div>
                    <label for="songi_tamir_yili" class="block text-gray-700 font-semibold mb-2">So‘ngi tamirlangan yili</label>
                    <input type="number" id="songi_tamir_yili" name="songi_tamir_yili" min="1800" max="{{ date('Y') }}" value="{{ old('songi_tamir_yili') }}" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 2020">
                </div>
                <div>
                    <label for="yer_maydoni" class="block text-gray-700 font-semibold mb-2">Yer maydoni (m²)</label>
                    <input type="number" id="yer_maydoni" name="yer_maydoni" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 5000" value="{{ old('yer_maydoni') }}">
                </div>
                <div>
                    <label for="xudud_oralganligi" class="block text-gray-700 font-semibold mb-2">Xudud o‘ralganligi</label>
                    <div class="flex items-center space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="xudud_oralganligi" value="1" {{ old('xudud_oralganligi') == '1' ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700">Ha</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="xudud_oralganligi" value="0" {{ old('xudud_oralganligi') == '0' ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700">Yo‘q</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label for="binolar_soni" class="block text-gray-700 font-semibold mb-2">Binolar soni</label>
                    <input type="number" id="binolar_soni" name="binolar_soni" min="0" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 2" value="{{ old('binolar_soni') }}">
                </div>
                <div>
                    <label for="binolar_qavatligi" class="block text-gray-700 font-semibold mb-2">Binolar qavatligi</label>
                    <input type="number" id="binolar_qavatligi" name="binolar_qavatligi" min="1" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 3" value="{{ old('binolar_qavatligi') }}">
                </div>
                <div>
                    <label for="binolar_maydoni" class="block text-gray-700 font-semibold mb-2">Binolar maydoni (m²)</label>
                    <input type="number" id="binolar_maydoni" name="binolar_maydoni" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 3000" value="{{ old('binolar_maydoni') }}">
                </div>
                <div>
                    <label for="istilidigan_maydon" class="block text-gray-700 font-semibold mb-2">Istilidigan maydon (m²)</label>
                    <input type="number" id="istilidigan_maydon" name="istilidigan_maydon" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 2500" value="{{ old('istilidigan_maydon') }}">
                </div>
                <div>
                    <label for="quvvati" class="block text-gray-700 font-semibold mb-2">Quvvati (bolalar soni)</label>
                    <input type="number" id="quvvati" name="quvvati" min="0" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 200" value="{{ old('quvvati') }}">
                </div>
                <div>
                    <label for="bolalar_soni" class="block text-gray-700 font-semibold mb-2">Bolalar soni</label>
                    <input type="number" id="bolalar_soni" name="bolalar_soni" min="0" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 150" value="{{ old('bolalar_soni') }}">
                </div>
                <div>
                    <label for="koffsiyent" class="block text-gray-700 font-semibold mb-2">Koffsiyent</label>
                    <input type="number" id="koffsiyent" name="koffsiyent" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 0.9" value="{{ old('koffsiyent') }}">
                </div>
                <div>
                    <label for="oshxona_yoki_bufet_quvvati" class="block text-gray-700 font-semibold mb-2">Oshxona yoki bufet quvvati</label>
                    <input type="text" id="oshxona_yoki_bufet_quvvati" name="oshxona_yoki_bufet_quvvati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 50 kishi" value="{{ old('oshxona_yoki_bufet_quvvati') }}">
                </div>
                <div>
                    <label for="sport_zal_soni_va_maydoni" class="block text-gray-700 font-semibold mb-2">Sport zal soni va maydoni</label>
                    <input type="text" id="sport_zal_soni_va_maydoni" name="sport_zal_soni_va_maydoni" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 1, 100 m²" value="{{ old('sport_zal_soni_va_maydoni') }}">
                </div>
                <div>
                    <label for="faollar_zali_va_quvvati" class="block text-gray-700 font-semibold mb-2">Faollar zali va quvvati</label>
                    <input type="text" id="faollar_zali_va_quvvati" name="faollar_zali_va_quvvati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 1, 50 kishi" value="{{ old('faollar_zali_va_quvvati') }}">
                </div>
                <div>
                    <label for="xolati" class="block text-gray-700 font-semibold mb-2">Xolati</label>
                    <input type="text" id="xolati" name="xolati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: Yaxshi" value="{{ old('xolati') }}">
                </div>
                <div>
                    <label for="tom_xolati_yuzda" class="block text-gray-700 font-semibold mb-2">Tom xolati (%)</label>
                    <input type="number" id="tom_xolati_yuzda" name="tom_xolati_yuzda" min="0" max="100" step="0.01" value="{{ old('tom_xolati_yuzda') }}" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 90">
                </div>
                <div>
                    <label for="deraza_rom_xolati_yuzda" class="block text-gray-700 font-semibold mb-2">Deraza rom xolati (%)</label>
                    <input type="number" id="deraza_rom_xolati_yuzda" name="deraza_rom_xolati_yuzda" min="0" max="100" step="0.01" value="{{ old('deraza_rom_xolati_yuzda') }}" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 85">
                </div>
                <div>
                    <label for="istish_turi" class="block text-gray-700 font-semibold mb-2">Istish turi</label>
                    <input type="text" id="istish_turi" name="istish_turi" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: Gaz" value="{{ old('istish_turi') }}">
                </div>
                <div>
                    <label for="qozonlar_soni" class="block text-gray-700 font-semibold mb-2">Qozonlar soni</label>
                    <input type="number" id="qozonlar_soni" name="qozonlar_soni" min="0" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 2" value="{{ old('qozonlar_soni') }}">
                </div>
                <div>
                    <label for="qozonlar_xolati_yuzda" class="block text-gray-700 font-semibold mb-2">Qozonlar xolati (%)</label>
                    <input type="number" id="qozonlar_xolati_yuzda" name="qozonlar_xolati_yuzda" min="0" max="100" step="0.01" value="{{ old('qozonlar_xolati_yuzda') }}" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 80">
                </div>
                <div>
                    <label for="apoklar_xolati_yuzda" class="block text-gray-700 font-semibold mb-2">Apoklar xolati (%)</label>
                    <input type="number" id="apoklar_xolati_yuzda" name="apoklar_xolati_yuzda" min="0" max="100" step="0.01" value="{{ old('apoklar_xolati_yuzda') }}" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 75">
                </div>
                <div>
                    <label for="gaz_istemoli" class="block text-gray-700 font-semibold mb-2">1 yillik o‘rtacha gaz iste’moli (m³)</label>
                    <input type="number" id="gaz_istemoli" name="gaz_istemoli" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 5000" value="{{ old('gaz_istemoli') }}">
                </div>
                <div>
                    <label for="elektr_istemoli" class="block text-gray-700 font-semibold mb-2">1 yillik o‘rtacha elektr iste’moli (kVt)</label>
                    <input type="number" id="elektr_istemoli" name="elektr_istemoli" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 10000" value="{{ old('elektr_istemoli') }}">
                </div>
                <div>
                    <label for="issiqlik_istemoli" class="block text-gray-700 font-semibold mb-2">1 yillik o‘rtacha issiqlik iste’moli (Gkal)</label>
                    <input type="number" id="issiqlik_istemoli" name="issiqlik_istemoli" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 2000" value="{{ old('issiqlik_istemoli') }}">
                </div>
                <div>
                    <label for="quyosh_paneli" class="block text-gray-700 font-semibold mb-2">Quyosh paneli</label>
                    <div class="flex items-center space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="quyosh_paneli" value="1" {{ old('quyosh_paneli') == '1' ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700">Bor</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="quyosh_paneli" value="0" {{ old('quyosh_paneli') == '0' ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700">Yo‘q</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label for="geokollektor" class="block text-gray-700 font-semibold mb-2">Geokollektor</label>
                    <div class="flex items-center space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="geokollektor" value="1" {{ old('geokollektor') == '1' ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700">Bor</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="geokollektor" value="0" {{ old('geokollektor') == '0' ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700">Yo‘q</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label for="boqcha_rasmlari" class="block text-gray-700 font-semibold mb-2">Bog‘cha rasmlari</label>
                    <input type="file" id="boqcha_rasmlari" name="boqcha_rasmlari" accept="image/jpeg,image/png,image/jpg,image/gif" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300">
                    <p class="text-gray-500 text-sm mt-1">JPEG, PNG, JPG yoki GIF formatida</p>
                </div>
                <div>
                    <label for="lokatsiya" class="block text-gray-700 font-semibold mb-2">Lokatsiya</label>
                    <input type="text" id="lokatsiya" name="lokatsiya" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: Google Maps silka" value="{{ old('lokatsiya') }}">
                </div>
            </div>
            <div class="flex justify-end gap-4 mt-6">
                <button type="button" onclick="document.getElementById('addKindergartenModal').classList.add('hidden')" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-full font-semibold hover:bg-gray-300 transition-all duration-300">Bekor qilish</button>
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-full font-semibold shadow-lg hover:shadow-xl transition-all duration-300">Qo‘shish</button>
            </div>
        </form>
    </div>
</div>

<!-- Dynamic Modals for Editing Kindergartens -->
@forelse($kindergartens as $kindergarten)
    <div id="editKindergartenModal-{{ $kindergarten->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-3xl p-6 sm:p-8 max-w-3xl w-full mx-4 sm:mx-auto shadow-2xl animate-fade-in-up overflow-y-auto max-h-[80vh]">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Bog‘chani Tahrirlash</h3>
            <form method="POST" action="{{ route('kindergarten.update', $kindergarten->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="district" value="{{ htmlspecialchars($_GET['district'] ?? '') }}">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="edit_boqcha_raqami_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Bog‘cha raqami</label>
                        <input type="text" id="edit_boqcha_raqami_{{ $kindergarten->id }}" name="boqcha_raqami" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('boqcha_raqami', $kindergarten->boqcha_raqami) }}" required>
                    </div>
                    <div>
                        <label for="edit_district_id_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Tuman</label>
                        <select id="edit_district_id_{{ $kindergarten->id }}" name="district_id" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300">
                            <option value="">Tumanni tanlang</option>
                            @if(isset($districts))
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}" {{ old('district_id', $kindergarten->district_id) == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                                @endforeach
                            @else
                                <option value="">No districts available</option>
                            @endif
                        </select>
                    </div>
                    <div>
                        <label for="edit_mfy_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Manzil (MFY)</label>
                        <input type="text" id="edit_mfy_{{ $kindergarten->id }}" name="mfy" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('mfy', $kindergarten->mfy ?? '') }}" required>
                    </div>
                    <div>
                        <label for="edit_qurilgan_yili_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Qurilgan yili</label>
                        <input type="number" id="edit_qurilgan_yili_{{ $kindergarten->id }}" name="qurilgan_yili" min="1800" max="{{ date('Y') }}" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('qurilgan_yili', $kindergarten->qurilgan_yili ?? '') }}" required>
                    </div>
                    <div>
                        <label for="edit_songi_tamir_yili_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">So‘ngi tamirlangan yili</label>
                        <input type="number" id="edit_songi_tamir_yili_{{ $kindergarten->id }}" name="songi_tamir_yili" min="1800" max="{{ date('Y') }}" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('songi_tamir_yili', $kindergarten->songi_tamir_yili ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_yer_maydoni_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Yer maydoni (m²)</label>
                        <input type="number" id="edit_yer_maydoni_{{ $kindergarten->id }}" name="yer_maydoni" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('yer_maydoni', $kindergarten->yer_maydoni ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_xudud_oralganligi_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Xudud o‘ralganligi</label>
                        <div class="flex items-center space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="xudud_oralganligi" value="1" {{ old('xudud_oralganligi', $kindergarten->xudud_oralganligi) == 1 ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
                                <span class="ml-2 text-gray-700">Ha</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="xudud_oralganligi" value="0" {{ old('xudud_oralganligi', $kindergarten->xudud_oralganligi) == 0 ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
                                <span class="ml-2 text-gray-700">Yo‘q</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label for="edit_binolar_soni_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Binolar soni</label>
                        <input type="number" id="edit_binolar_soni_{{ $kindergarten->id }}" name="binolar_soni" min="0" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('binolar_soni', $kindergarten->binolar_soni ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_binolar_qavatligi_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Binolar qavatligi</label>
                        <input type="number" id="edit_binolar_qavatligi_{{ $kindergarten->id }}" name="binolar_qavatligi" min="1" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('binolar_qavatligi', $kindergarten->binolar_qavatligi ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_binolar_maydoni_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Binolar maydoni (m²)</label>
                        <input type="number" id="edit_binolar_maydoni_{{ $kindergarten->id }}" name="binolar_maydoni" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('binolar_maydoni', $kindergarten->binolar_maydoni ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_istilidigan_maydon_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Istilidigan maydon (m²)</label>
                        <input type="number" id="edit_istilidigan_maydon_{{ $kindergarten->id }}" name="istilidigan_maydon" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('istilidigan_maydon', $kindergarten->istilidigan_maydon ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_quvvati_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Quvvati (bolalar soni)</label>
                        <input type="number" id="edit_quvvati_{{ $kindergarten->id }}" name="quvvati" min="0" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('quvvati', $kindergarten->quvvati ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_bolalar_soni_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Bolalar soni</label>
                        <input type="number" id="edit_bolalar_soni_{{ $kindergarten->id }}" name="bolalar_soni" min="0" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('bolalar_soni', $kindergarten->bolalar_soni ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_koffsiyent_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Koffsiyent</label>
                        <input type="number" id="edit_koffsiyent_{{ $kindergarten->id }}" name="koffsiyent" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('koffsiyent', $kindergarten->koffsiyent ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_oshxona_yoki_bufet_quvvati_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Oshxona yoki bufet quvvati</label>
                        <input type="text" id="edit_oshxona_yoki_bufet_quvvati_{{ $kindergarten->id }}" name="oshxona_yoki_bufet_quvvati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('oshxona_yoki_bufet_quvvati', $kindergarten->oshxona_yoki_bufet_quvvati ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_sport_zal_soni_va_maydoni_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Sport zal soni va maydoni</label>
                        <input type="text" id="edit_sport_zal_soni_va_maydoni_{{ $kindergarten->id }}" name="sport_zal_soni_va_maydoni" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('sport_zal_soni_va_maydoni', $kindergarten->sport_zal_soni_va_maydoni ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_faollar_zali_va_quvvati_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Faollar zali va quvvati</label>
                        <input type="text" id="edit_faollar_zali_va_quvvati_{{ $kindergarten->id }}" name="faollar_zali_va_quvvati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('faollar_zali_va_quvvati', $kindergarten->faollar_zali_va_quvvati ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_xolati_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Xolati</label>
                        <input type="text" id="edit_xolati_{{ $kindergarten->id }}" name="xolati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('xolati', $kindergarten->xolati ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_tom_xolati_yuzda_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Tom xolati (%)</label>
                        <input type="number" id="edit_tom_xolati_yuzda_{{ $kindergarten->id }}" name="tom_xolati_yuzda" min="0" max="100" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('tom_xolati_yuzda', $kindergarten->tom_xolati_yuzda ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_deraza_rom_xolati_yuzda_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Deraza rom xolati (%)</label>
                        <input type="number" id="edit_deraza_rom_xolati_yuzda_{{ $kindergarten->id }}" name="deraza_rom_xolati_yuzda" min="0" max="100" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('deraza_rom_xolati_yuzda', $kindergarten->deraza_rom_xolati_yuzda ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_istish_turi_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Istish turi</label>
                        <input type="text" id="edit_istish_turi_{{ $kindergarten->id }}" name="istish_turi" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('istish_turi', $kindergarten->istish_turi ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_qozonlar_soni_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Qozonlar soni</label>
                        <input type="number" id="edit_qozonlar_soni_{{ $kindergarten->id }}" name="qozonlar_soni" min="0" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('qozonlar_soni', $kindergarten->qozonlar_soni ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_qozonlar_xolati_yuzda_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Qozonlar xolati (%)</label>
                        <input type="number" id="edit_qozonlar_xolati_yuzda_{{ $kindergarten->id }}" name="qozonlar_xolati_yuzda" min="0" max="100" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('qozonlar_xolati_yuzda', $kindergarten->qozonlar_xolati_yuzda ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_apoklar_xolati_yuzda_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Apoklar xolati (%)</label>
                        <input type="number" id="edit_apoklar_xolati_yuzda_{{ $kindergarten->id }}" name="apoklar_xolati_yuzda" min="0" max="100" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('apoklar_xolati_yuzda', $kindergarten->apoklar_xolati_yuzda ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_gaz_istemoli_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">1 yillik o‘rtacha gaz iste’moli (m³)</label>
                        <input type="number" id="edit_gaz_istemoli_{{ $kindergarten->id }}" name="gaz_istemoli" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('gaz_istemoli', $kindergarten->gaz_istemoli ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_elektr_istemoli_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">1 yillik o‘rtacha elektr iste’moli (kVt)</label>
                        <input type="number" id="edit_elektr_istemoli_{{ $kindergarten->id }}" name="elektr_istemoli" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('elektr_istemoli', $kindergarten->elektr_istemoli ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_issiqlik_istemoli_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">1 yillik o‘rtacha issiqlik iste’moli (Gkal)</label>
                        <input type="number" id="edit_issiqlik_istemoli_{{ $kindergarten->id }}" name="issiqlik_istemoli" step="0.01" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('issiqlik_istemoli', $kindergarten->issiqlik_istemoli ?? '') }}">
                    </div>
                    <div>
                        <label for="edit_quyosh_paneli_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Quyosh paneli</label>
                        <div class="flex items-center space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="quyosh_paneli" value="1" {{ old('quyosh_paneli', $kindergarten->quyosh_paneli) == 1 ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
                                <span class="ml-2 text-gray-700">Bor</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="quyosh_paneli" value="0" {{ old('quyosh_paneli', $kindergarten->quyosh_paneli) == 0 ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
                                <span class="ml-2 text-gray-700">Yo‘q</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label for="edit_geokollektor_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Geokollektor</label>
                        <div class="flex items-center space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="geokollektor" value="1" {{ old('geokollektor', $kindergarten->geokollektor) == 1 ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
                                <span class="ml-2 text-gray-700">Bor</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="geokollektor" value="0" {{ old('geokollektor', $kindergarten->geokollektor) == 0 ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
                                <span class="ml-2 text-gray-700">Yo‘q</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label for="edit_boqcha_rasmlari_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Bog‘cha rasmlari</label>
                        <input type="file" id="edit_boqcha_rasmlari_{{ $kindergarten->id }}" name="boqcha_rasmlari" accept="image/jpeg,image/png,image/jpg,image/gif" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300">
                        <p class="text-gray-500 text-sm mt-1">JPEG, PNG, JPG yoki GIF formatida</p>
                    </div>
                    <div>
                        <label for="edit_lokatsiya_{{ $kindergarten->id }}" class="block text-gray-700 font-semibold mb-2">Lokatsiya</label>
                        <input type="text" id="edit_lokatsiya_{{ $kindergarten->id }}" name="lokatsiya" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="{{ old('lokatsiya', $kindergarten->lokatsiya ?? '') }}">
                    </div>
                </div>
                <div class="flex justify-end gap-4 mt-6">
                    <button type="button" onclick="document.getElementById('editKindergartenModal-{{ $kindergarten->id }}').classList.add('hidden')" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-full font-semibold hover:bg-gray-300 transition-all duration-300">Bekor qilish</button>
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-full font-semibold shadow-lg hover:shadow-xl transition-all duration-300">Saqlash</button>
                </div>
            </form>
        </div>
    </div>
@empty
    <!-- No kindergartens to edit -->
@endforelse

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

    // Chiqish tugmasi (Desktop)
    document.getElementById('logoutBtn').addEventListener('click', (e) => {
        e.preventDefault();
        if (confirm('Chiqishni xohlaysizmi?')) {
            alert('Tizimdan chiqildi.');
            window.location.href = '/dashboard';
        }
    });

    // Chiqish tugmasi (Mobile)
    document.getElementById('mobileLogoutBtn').addEventListener('click', (e) => {
        e.preventDefault();
        if (confirm('Chiqishni xohlaysizmi?')) {
            alert('Tizimdan chiqildi.');
            window.location.href = '/dashboard';
        }
    });

    // Search Functionality
    document.querySelector('input[name="search"]').addEventListener('input', (e) => {
        const searchValue = e.target.value.toLowerCase();
        const kindergartens = document.querySelectorAll('#kindergartensList > div');

        kindergartens.forEach(kindergarten => {
            const kindergartenName = kindergarten.querySelector('h4').textContent.toLowerCase();
            kindergarten.style.display = kindergartenName.includes(searchValue) ? '' : 'none';
        });
    });

    // Dynamic Placeholder Update
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.querySelector('input[name="search"]');
        const path = window.location.pathname.toLowerCase();

        // Update search placeholder based on page type
        if (path.includes('schools') || path.includes('maktab')) {
            searchInput.placeholder = 'Maktab qidirish...';
        } else if (path.includes('kindergartens') || path.includes('bogcha')) {
            searchInput.placeholder = 'Bog‘cha qidirish...';
        } else {
            searchInput.placeholder = 'Qidirish...';
        }
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
