<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTV - Tumanlar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}?v={{ filemtime(public_path('css/app.css')) }}" rel="stylesheet">
</head>
<body class="font-inter bg-gray-50 min-h-screen flex flex-col overflow-x-hidden">
<!-- Navbar -->
<nav class="bg-gradient-to-r from-blue-900 to-indigo-900 text-white shadow-xl w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <div class="flex-shrink-0 flex items-center">
                <h1 class="text-4xl font-extrabold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-indigo-600">MTV</h1>
            </div>
            <div class="hidden md:flex space-x-12">
                <a href="{{ route('welcome') }}" class="relative text-lg font-semibold text-gray-100 hover:text-blue-300 transition-all duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-blue-300 after:transition-all after:duration-300 hover:after:w-full">Bosh sahifa</a>
                <a href="{{ route('school-region') }}" class="relative text-lg font-semibold text-gray-100 hover:text-blue-300 transition-all duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-blue-300 after:transition-all after:duration-300 hover:after:w-full">Maktablar</a>
                <a href="{{ route('kindergarten-region') }}" class="relative text-lg font-semibold text-gray-100 hover:text-blue-300 transition-all duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-blue-300 after:transition-all after:duration-300 hover:after:w-full">Bog'chalar</a>
            </div>
            <div class="hidden md:flex items-center gap-4">
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                        Chiqish
                    </button>
                </form>
            </div>
            <!-- Hamburger Menu -->
            <div class="md:hidden flex items-center">
                <button id="menuBtn" class="text-white focus:outline-none">
                    <i class="fas fa-bars text-3xl"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-gradient-to-r from-blue-900 to-indigo-900 text-white px-6 py-8 animate-slide-in">
        <a href="{{ route('welcome') }}" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Bosh sahifa</a>
        <a href="{{ route('school-region') }}" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Maktablar</a>
        <a href="{{ route('kindergarten-region') }}" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Bog'chalar</a>
        <form method="POST" action="{{ route('logout') }}" class="block mt-6">
            @csrf
            <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold text-center hover:shadow-lg transition">
                Chiqish
            </button>
        </form>
    </div>
</nav>

<!-- Page Header and Search Section -->
<div class="bg-gradient-to-r from-blue-50 to-indigo-50 pt-32 pb-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600 sm:text-5xl md:text-6xl">
                Toshkent tumanlari
            </h1>
            <p class="mt-3 max-w-md mx-auto text-base text-gray-600 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                Har bir tumandagi ta'lim muassasalari haqida ma'lumot
            </p>
        </div>
        
        <div class="mt-10 max-w-lg mx-auto">
            <div class="relative flex items-center">
                <input id="searchInput" type="text" class="block w-full px-8 py-4 text-gray-900 bg-white border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-md"
                    placeholder="Tuman nomini kiriting...">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
            </div>
        @include('components.flash-messages')
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-16">
            <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <i class="fas fa-map-marker-alt text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Tumanlar</p>
                        <p class="text-2xl font-bold text-gray-900">{{ count($districts) }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                        <i class="fas fa-school text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Maktablar</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $totalSchools }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-pink-100 text-pink-600">
                        <i class="fas fa-baby text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Bog'chalar</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $totalKindergartens }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Jami sig'im</p>
                        <p class="text-2xl font-bold text-gray-900">{{ number_format($totalCapacity) }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Districts Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="districtsGrid">
            @foreach($districts as $district)
                <div class="district-card card-hover bg-white rounded-2xl shadow-md overflow-hidden">
                    <div class="px-6 py-5 bg-gradient-to-r from-blue-600 to-indigo-600">
                        <h3 class="text-xl font-bold text-white">{{ $district->name }}</h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="bg-blue-50 rounded-lg p-4 text-center">
                                <p class="text-sm font-medium text-gray-500">Maktablar</p>
                                <p class="text-2xl font-bold text-blue-600">{{ $district->schools->count() }}</p>
                            </div>
                            <div class="bg-pink-50 rounded-lg p-4 text-center">
                                <p class="text-sm font-medium text-gray-500">Bog'chalar</p>
                                <p class="text-2xl font-bold text-pink-600">{{ $district->kindergartens->count() }}</p>
                            </div>
                        </div>
                        <div class="bg-green-50 rounded-lg p-4 text-center mb-6">
                            <p class="text-sm font-medium text-gray-500">Jami sig'im</p>
                            @php
                                $schoolCapacity = $district->schools->sum('capacity');
                                $kindergartenCapacity = $district->kindergartens->sum('capacity');
                                $totalCapacity = $schoolCapacity + $kindergartenCapacity;
                            @endphp
                            <p class="text-2xl font-bold text-green-600">{{ number_format($totalCapacity) }}</p>
                        </div>
                        <div class="flex space-x-3">
                            <a href="{{ route('districts.show', $district) }}" class="flex-1 text-center py-3 px-4 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-medium rounded-lg hover:shadow-md transition-all duration-300">
                                <i class="fas fa-eye mr-2"></i> Batafsil
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- No results message -->
        <div id="noResults" class="hidden text-center py-12">
            <i class="fas fa-search text-gray-300 text-5xl mb-4"></i>
            <p class="text-xl text-gray-500">Tuman topilmadi. Iltimos, boshqa nom bilan qidirib ko'ring.</p>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gradient-to-br from-blue-900 to-indigo-950 text-white py-10 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-16">
            <div>
                <h3 class="text-3xl font-extrabold mb-6 bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-indigo-600">Maktabgacha Ta'lim</h3>
                <p class="text-gray-300 leading-relaxed">Bolalarimizning kelajagi uchun eng yaxshi ta'lim muhitini yaratamiz.</p>
            </div>
            <div>
                <h3 class="text-2xl font-semibold mb-6">Tez havolalar</h3>
                <ul class="space-y-4">
                    <li><a href="{{ route('welcome') }}" class="text-gray-300 hover:text-blue-300 hover:translate-x-2 transition-all duration-300">Bosh sahifa</a></li>
                    <li><a href="{{ route('school-region') }}" class="text-gray-300 hover:text-blue-300 hover:translate-x-2 transition-all duration-300">Maktablar</a></li>
                    <li><a href="{{ route('kindergarten-region') }}" class="text-gray-300 hover:text-blue-300 hover:translate-x-2 transition-all duration-300">Bog'chalar</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-2xl font-semibold mb-6">Bog'lanish</h3>
                <p class="text-gray-300 mb-4">Email: <a href="mailto:info@mtv.uz" class="hover:text-blue-300 transition">info@mtv.uz</a></p>
                <p class="text-gray-300 mb-4">Telefon: <a href="tel:+998711234567" class="hover:text-blue-300 transition">+998 71 123 45 67</a></p>
                <p class="text-gray-300">Manzil: Toshkent


<!-- JavaScript for search functionality -->
<!-- Include Districts JS -->
<script src="{{ asset('js/districts.js') }}?v={{ filemtime(public_path('js/districts.js')) }}"></script>
</body>
</html>
