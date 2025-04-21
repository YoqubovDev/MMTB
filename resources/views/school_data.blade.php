<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTV - Maktab Ma'lumotlari</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .preview-img {
            border-radius: 8px;
            transition: transform 0.3s ease;
        }
        .preview-img:hover {
            transform: scale(1.05);
        }
        .image-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            max-height: 400px;
            overflow-y: auto;
            padding: 1rem;
            background-color: #f9fafb;
            border-radius: 8px;
        }
        .location-link:hover {
            color: #2563eb;
            text-decoration: underline;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
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
                <a href="#" class="relative text-lg font-semibold text-gray-100 hover:text-blue-300 transition-all duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-blue-300 after:transition-all after:duration-300 hover:after:w-full">Bog'lanish</a>
            </div>
            <div class="hidden md:flex items-center gap-4">
                @auth
                    <a href="{{ route('logout') }}" id="logoutBtn" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
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
        <a href="{{ route('added') }}" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Bosh sahifa</a>
        <a href="#" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Yangiliklar</a>
        <a href="#" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Hujjatlar</a>
        <a href="#" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Bog‘lanish</a>
        @auth
            <a href="{{ route('logout') }}" id="mobileLogoutBtn" class="block mt-6 bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold text-center hover:shadow-lg transition">Chiqish</a>
        @else
            <a href="{{ route('login') }}" class="block mt-6 bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold text-center hover:shadow-lg transition">Kirish</a>
        @endauth
    </div>
</nav>

<!-- Main Content -->
<section class="py-32 bg-gradient-to-br from-blue-50 via-white to-indigo-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-5xl font-extrabold text-gray-900 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600 mb-12">
            Maktab Ma'lumotlari
        </h2>
        <div class="bg-white p-8 rounded-3xl shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Umumiy Ma'lumotlar</h3>
                    <p class="text-gray-600 mb-2"><strong>Manzil (MFY):</strong> {{ $school->mfy ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Qurilgan yili:</strong> {{ $school->qurilgan_yili ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>So‘ngi tamirlangan yili:</strong> {{ $school->songi_tamir_yili ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Sektor raqami:</strong> {{ $school->sektor_raqami ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Yer maydoni:</strong> {{ $school->yer_maydoni ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Xudud o'ralganligi:</strong> {{ $school->xudud_oralganligi ? 'Ha' : 'Yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Binolar soni:</strong> {{ $school->binolar_soni ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Binolar qavatligi:</strong> {{ $school->binolar_qavatligi ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Binolar maydoni:</strong> {{ $school->binolar_maydoni ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Istilidigan maydon:</strong> {{ $school->istilidigan_maydon ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Quvvati:</strong> {{ $school->quvvati ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>O'quvchi soni:</strong> {{ $school->oquvchi_soni ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Koffsiyent:</strong> {{ $school->koffsiyent ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Infratuzilma</h3>
                    <p class="text-gray-600 mb-2"><strong>Oshxona yoki bufet quvvati:</strong> {{ $school->oshxona_yoki_bufet_quvvati ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Sport zal soni va maydoni:</strong> {{ $school->sport_zal_soni_va_maydoni ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Faollar zali va quvvati:</strong> {{ $school->faollar_zali_va_quvvati ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Xolati:</strong> {{ $school->xolati ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Tom xolati % da:</strong> {{ $school->tom_xolati_yuzda ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Deraza rom xolati % da:</strong> {{ $school->deraza_rom_xolati_yuzda ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Istish turi:</strong> {{ $school->istish_turi ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Qozonlar soni:</strong> {{ $school->qozonlar_soni ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Qozonlar xolati % da:</strong> {{ $school->qozonlar_xolati_yuzda ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Apoklar xolati % da:</strong> {{ $school->apoklar_xolati_yuzda ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Energiya Iste'moli</h3>
                    <p class="text-gray-600 mb-2"><strong>1 yillik o‘rtacha gaz iste’moli:</strong> {{ $school->gaz_istemoli ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>1 yillik o‘rtacha elektr iste’moli:</strong> {{ $school->elektr_istemoli ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>1 yillik o‘rtacha issiqlik iste’moli:</strong> {{ $school->issiqlik_istemoli ?? 'Ma\'lumot yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Quyosh paneli:</strong> {{ $school->quyosh_paneli ? 'Ha' : 'Yo\'q' }}</p>
                    <p class="text-gray-600 mb-2"><strong>Geokollektor:</strong> {{ $school->geokollektor ? 'Ha' : 'Yo\'q' }}</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Lokatsiya va Rasmlar</h3>
                    <p class="text-gray-600 mb-2">
                        <strong>Lokatsiya:</strong>
                        @if($school->lokatsiya)
                            <a href="{{ $school->lokatsiya }}" target="_blank" class="location-link text-gray-600 hover:underline">
                                Ko‘rish
                            </a>
                        @else
                            Ma'lumot yo'q
                        @endif
                    </p>
                    <div class="mt-4">
                        <label class="block text-gray-700 font-semibold mb-2">Maktab Rasmlari:</label>
                        <div class="image-grid">
                            @if($school->maktab_rasmlari)
                                <img class="preview-img w-full h-32 object-cover" src="{{ Storage::url($school->maktab_rasmlari) }}" alt="Maktab Rasmi">
                            @else
                                <p class="text-gray-600">Rasm yo'q</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-8 flex justify-end">
                <a href="{{ route('added') }}" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl transition-all duration-300">
                    Orqaga
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gradient-to-br from-blue-900 to-indigo-950 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-16">
            <div>
                <h3 class="text-3xl font-extrabold mb-6 bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-indigo-600">Maktabgacha Ta'lim</h3>
                <p class="text-gray-300 leading-relaxed">Bolalarimizning kelajagi uchun eng yaxshi ta’lim muhitini yaratamiz.</p>
            </div>
            <div>
                <h3 class="text-2xl font-semibold mb-6">Tez havolalar</h3>
                <ul class="space-y-4">
                    <li><a href="/" class="text-gray-300 hover:text-blue-300 hover:translate-x-2 transition-all duration-300">Bosh sahifa</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-blue-300 hover:translate-x-2 transition-all duration-300">Yangiliklar</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-blue-300 hover:translate-x-2 transition-all duration-300">Hujjatlar</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-blue-300 hover:translate-x-2 transition-all duration-300">Bog‘lanish</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-2xl font-semibold mb-6">Bog‘lanish</h3>
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

    // Chiqish tugmasi (Desktop)
    const logoutBtn = document.getElementById('logoutBtn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (confirm('Chiqishni xohlaysizmi?')) {
                window.location.href = '{{ route('logout') }}';
            }
        });
    }

    // Chiqish tugmasi (Mobile)
    const mobileLogoutBtn = document.getElementById('mobileLogoutBtn');
    if (mobileLogoutBtn) {
        mobileLogoutBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (confirm('Chiqishni xohlaysizmi?')) {
                window.location.href = '{{ route('logout') }}';
            }
        });
    }
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
