<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTV - Maktab Ma'lumotlari</title>
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
                {{ $added->id }}-maktab Ma'lumotlari
            </h2>
            <div class="flex gap-4">
                <a href="{{ route('added.edit', $added->id) }}" class="bg-yellow-500 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                    <i class="fas fa-edit mr-2"></i> Tahrirlash
                </a>
                <a href="{{ route('added') }}" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                    <i class="fas fa-arrow-left mr-2"></i> Ortga
                </a>
            </div>
        </div>

        <!-- School Image -->
        @if($added->maktab_rasmlari)
        <div class="mb-10 bg-white p-6 rounded-3xl shadow-lg animate-fade-in-up">
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Maktab rasmi</h3>
            <div class="flex justify-center">
                <img src="{{ Storage::url($added->maktab_rasmlari) }}" alt="Maktab rasmi" class="rounded-lg shadow-lg max-h-96 object-contain">
            </div>
        </div>
        @endif

        <!-- Basic Information -->
        <div class="bg-white rounded-3xl p-6 shadow-lg mb-8 animate-fade-in-up">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                <i class="fas fa-info-circle text-blue-600 mr-3"></i>
                Asosiy Ma'lumotlar
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">ID</h4>
                    <p class="text-lg text-gray-800">{{ $added->id }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">MFY</h4>
                    <p class="text-lg text-gray-800">{{ $added->mfy ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Tuman</h4>
                    <p class="text-lg text-gray-800">{{ $added->district->name ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Qurilgan yili</h4>
                    <p class="text-lg text-gray-800">{{ $added->qurilgan_yili ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">So'ngi tamirlangan yili</h4>
                    <p class="text-lg text-gray-800">{{ $added->songi_tamir_yili ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Sektor raqami</h4>
                    <p class="text-lg text-gray-800">{{ $added->sektor_raqami ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Lokatsiya</h4>
                    <p class="text-lg text-gray-800">
                        @if($added->lokatsiya)
                            <a href="{{ $added->lokatsiya }}" target="_blank" class="text-blue-600 hover:text-blue-800 hover:underline">
                                <i class="fas fa-map-marker-alt mr-1"></i> Xaritada ko'rish
                            </a>
                        @else
                            Ma'lumot yo'q
                        @endif
                    </p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Yaratilgan sana</h4>
                    <p class="text-lg text-gray-800">{{ $added->created_at->format('d.m.Y H:i') }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Oxirgi yangilangan</h4>
                    <p class="text-lg text-gray-800">{{ $added->updated_at->format('d.m.Y H:i') }}</p>
                </div>
            </div>
        </div>

        <!-- Building Details -->
        <div class="bg-white rounded-3xl p-6 shadow-lg mb-8 animate-fade-in-up">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                <i class="fas fa-building text-blue-600 mr-3"></i>
                Bino Ma'lumotlari
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Yer maydoni</h4>
                    <p class="text-lg text-gray-800">{{ $added->yer_maydoni ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Xudud o'ralganligi</h4>
                    <p class="text-lg text-gray-800">
                        @if($added->xudud_oralganligi === 1)
                            <span class="text-green-600"><i class="fas fa-check-circle mr-1"></i> Ha</span>
                        @elseif($added->xudud_oralganligi === 0)
                            <span class="text-red-600"><i class="fas fa-times-circle mr-1"></i> Yo'q</span>
                        @else
                            Ma'lumot yo'q
                        @endif
                    </p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Binolar soni</h4>
                    <p class="text-lg text-gray-800">{{ $added->binolar_soni ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Binolar qavatligi</h4>
                    <p class="text-lg text-gray-800">{{ $added->binolar_qavatligi ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Binolar maydoni</h4>
                    <p class="text-lg text-gray-800">{{ $added->binolar_maydoni ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Istilidigan maydon</h4>
                    <p class="text-lg text-gray-800">{{ $added->istilidigan_maydon ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Tom xolati</h4>
                    <p class="text-lg text-gray-800">
                        @if(isset($added->tom_xolati_yuzda))
                            <div class="flex items-center">
                                <span class="text-lg font-semibold mr-2">{{ $added->tom_xolati_yuzda }}%</span>
                                <div class="w-24 bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ min($added->tom_xolati_yuzda, 100) }}%"></div>
                                </div>
                            </div>
                        @else
                            Ma'lumot yo'q
                        @endif
                    </p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Deraza rom xolati</h4>
                    <p class="text-lg text-gray-800">
                        @if(isset($added->deraza_rom_xolati_yuzda))
                            <div class="flex items-center">
                                <span class="text-lg font-semibold mr-2">{{ $added->deraza_rom_xolati_yuzda }}%</span>
                                <div class="w-24 bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ min($added->deraza_rom_xolati_yuzda, 100) }}%"></div>
                                </div>
                            </div>
                        @else
                            Ma'lumot yo'q
                        @endif
                    </p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Umumiy xolati</h4>
                    <p class="text-lg text-gray-800">{{ $added->xolati ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
            </div>
        </div>

        <!-- Capacity and Students -->
        <div class="bg-white rounded-3xl p-6 shadow-lg mb-8 animate-fade-in-up">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                <i class="fas fa-users text-blue-600 mr-3"></i>
                Quvvati va O'quvchilar
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Quvvati</h4>
                    <p class="text-lg text-gray-800">{{ $added->quvvati ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">O'quvchi soni</h4>
                    <p class="text-lg text-gray-800">{{ $added->oquvchi_soni ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Koffsiyent</h4>
                    <p class="text-lg text-gray-800">{{ $added->koffsiyent ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Oshxona/bufet quvvati</h4>
                    <p class="text-lg text-gray-800">{{ $added->oshxona_yoki_bufet_quvvati ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Sport zal</h4>
                    <p class="text-lg text-gray-800">{{ $added->sport_zal_soni_va_maydoni ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Faollar zali</h4>
                    <p class="text-lg text-gray-800">{{ $added->faollar_zali_va_quvvati ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
            </div>
        </div>

        <!-- Infrastructure -->
        <div class="bg-white rounded-3xl p-6 shadow-lg mb-8 animate-fade-in-up">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                <i class="fas fa-cogs text-blue-600 mr-3"></i>
                Infratuzilma
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Isitish turi</h4>
                    <p class="text-lg text-gray-800">{{ $added->istish_turi ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Qozonlar soni</h4>
                    <p class="text-lg text-gray-800">{{ $added->qozonlar_soni ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Qozonlar xolati</h4>
                    <p class="text-lg text-gray-800">
                        @if(isset($added->qozonlar_xolati_yuzda))
                            <div class="flex items-center">
                                <span class="text-lg font-semibold mr-2">{{ $added->qozonlar_xolati_yuzda }}%</span>
                                <div class="w-24 bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ min($added->qozonlar_xolati_yuzda, 100) }}%"></div>
                                </div>
                            </div>
                        @else
                            Ma'lumot yo'q
                        @endif
                    </p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Apoklar xolati</h4>
                    <p class="text-lg text-gray-800">
                        @if(isset($added->apoklar_xolati_yuzda))
                            <div class="flex items-center">
                                <span class="text-lg font-semibold mr-2">{{ $added->apoklar_xolati_yuzda }}%</span>
                                <div class="w-24 bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ min($added->apoklar_xolati_yuzda, 100) }}%"></div>
                                </div>
                            </div>
                        @else
                            Ma'lumot yo'q
                        @endif
                    </p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Yillik gaz iste'moli</h4>
                    <p class="text-lg text-gray-800">{{ $added->gaz_istemoli ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Yillik elektr iste'moli</h4>
                    <p class="text-lg text-gray-800">{{ $added->elektr_istemoli ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Yillik issiqlik iste'moli</h4>
                    <p class="text-lg text-gray-800">{{ $added->issiqlik_istemoli ?? 'Ma\'lumot yo\'q' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Quyosh paneli</h4>
                    <p class="text-lg text-gray-800">
                        @if($added->quyosh_paneli === 1)
                            <span class="text-green-600"><i class="fas fa-check-circle mr-1"></i> Bor</span>
                        @elseif($added->quyosh_paneli === 0)
                            <span class="text-red-600"><i class="fas fa-times-circle mr-1"></i> Yo'q</span>
                        @else
                            Ma'lumot yo'q
                        @endif
                    </p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Geokollektor</h4>
                    <p class="text-lg text-gray-800">
                        @if($added->geokollektor === 1)
                            <span class="text-green-600"><i class="fas fa-check-circle mr-1"></i> Bor</span>
                        @elseif($added->geokollektor === 0)
                            <span class="text-red-600"><i class="fas fa-times-circle mr-1"></i> Yo'q</span>
                        @else
                            Ma'lumot yo'q
                        @endif
                    </p>
                </div>
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
