<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTV - {{ $district->name }}</title>
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

<!-- District Header -->
<div class="bg-gradient-to-r from-blue-600 to-indigo-600 py-20 px-4 sm:px-6 lg:px-8 text-white">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div>
                <h1 class="text-4xl font-extrabold">{{ $district->name }}</h1>
                <p class="mt-2 text-blue-100">{{ $district->region }}</p>
            </div>
            <a href="{{ route('districts.index') }}" class="px-6 py-3 bg-white text-blue-600 rounded-lg font-medium hover:shadow-lg transition-all duration-200 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Barcha tumanlar
            </a>
        </div>

        <!-- District Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-12">
            <div class="bg-white/20 backdrop-blur-sm rounded-xl p-6 hover:bg-white/30 transition-colors duration-300">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-white/30 text-white">
        @include('components.flash-messages')
            <div class="bg-white/20 backdrop-blur-sm rounded-xl p-6 hover:bg-white/30 transition-colors duration-300">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-white/30 text-white">
                        <i class="fas fa-baby text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-blue-100">Bog'chalar</p>
                        <p class="text-2xl font-bold">{{ $district->kindergartens->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-xl p-6 hover:bg-white/30 transition-colors duration-300">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-white/30 text-white">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-blue-100">Jami sig'im</p>
                        @php
                            $schoolCapacity = $district->schools->sum('capacity');
                            $kindergartenCapacity = $district->kindergartens->sum('capacity');
                            $totalCapacity = $schoolCapacity + $kindergartenCapacity;
                        @endphp
                        <p class="text-2xl font-bold">{{ number_format($totalCapacity) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Area - Schools & Kindergartens -->
<section class="py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Schools Section -->
        <div class="mb-16">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900">
                    <i class="fas fa-school text-blue-600 mr-2"></i> Maktablar
                </h2>
                <a href="{{ route('schools.create') }}" class="mt-2 md:mt-0 px-6 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-lg font-medium hover:shadow-lg transition-all duration-200 flex items-center">
                    <i class="fas fa-plus mr-2"></i> Yangi maktab
                </a>
            </div>
            
            <!-- Search Bar for Schools -->
            <div class="bg-white rounded-lg shadow-md mb-6 p-4">
                <div class="relative">
                    <input 
                        type="text" 
                        id="schoolSearchInput" 
                        placeholder="Maktab nomini kiriting..." 
                        class="w-full px-10 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>
            
            <!-- Schools Table -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <table id="schoolsTable" class="sortable min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-blue-50 to-indigo-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Maktab nomi</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Direktor</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sig'imi</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Amallar</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="schoolsTableBody">
                            @forelse($district->schools as $school)
                                <tr class="table-row-hover transition-colors school-row">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-blue-600">{{ $school->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $school->address }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $school->principal_name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ number_format($school->capacity) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('schools.show', $school) }}" class="text-blue-600 hover:text-blue-800 transition-colors p-1" title="Ko'rish">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('schools.edit', $school) }}" class="text-green-600 hover:text-green-800 transition-colors p-1" title="Tahrirlash">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form method="POST" action="{{ route('schools.destroy', $school) }}" class="inline" onsubmit="return confirm('Maktabni o\'chirishni tasdiqlaysizmi?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 transition-colors p-1" title="O'chirish">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                        <i class="fas fa-school text-4xl mb-3 text-gray-300"></i>
                                        <p>Bu tumanda maktablar topilmadi.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- No Results for Schools -->
                <div id="noSchoolResults" class="hidden py-10 text-center">
                    <i class="fas fa-search text-gray-300 text-4xl mb-3"></i>
                    <p class="text-gray-500">Qidiruv bo'yicha maktab topilmadi.</p>
                </div>
            </div>
        </div>
        
        <!-- Kindergartens Section -->
        <div>
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900">
                    <i class="fas fa-baby text-pink-600 mr-2"></i> Bog'chalar
                </h2>
                <a href="{{ route('kindergartens.create') }}" class="mt-2 md:mt-0 px-6 py-2 bg-gradient-to-r from-pink-500 to-purple-600 text-white rounded-lg font-medium hover:shadow-lg transition-all duration-200 flex items-center">
                    <i class="fas fa-plus mr-2"></i> Yangi bog'cha
                </a>
            </div>
            
            <!-- Search Bar for Kindergartens -->
            <div class="bg-white rounded-lg shadow-md mb-6 p-4">
                <div class="relative">
                    <input 
                        type="text" 
                        id="kindergartenSearchInput" 
                        placeholder="Bog'cha nomini kiriting..." 
                        class="w-full px-10 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                    >
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>
            
            <!-- Kindergartens Table -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <table id="kindergartensTable" class="sortable min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-pink-50 to-purple-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bog'cha nomi</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Direktor</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Yosh chegarasi</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sig'imi</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Amallar</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="kindergartensTableBody">
                            @forelse($district->kindergartens as $kindergarten)
                                <tr class="table-row-hover transition-colors kindergarten-row">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-pink-600">{{ $kindergarten->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $kindergarten->address }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $kindergarten->director_name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $kindergarten->age_range }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ number_format($kindergarten->capacity) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('kindergartens.show', $kindergarten) }}" class="text-blue-600 hover:text-blue-800 transition-colors p-1" title="Ko'rish">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('kindergartens.edit', $kindergarten) }}" class="text-green-600 hover:text-green-800 transition-colors p-1" title="Tahrirlash">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form method="POST" action="{{ route('kindergartens.destroy', $kindergarten) }}" class="inline" onsubmit="return confirm('Bog\'chani o\'chirishni tasdiqlaysizmi?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 transition-colors p-1" title="O'chirish">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                        <i class="fas fa-baby text-4xl mb-3 text-gray-300"></i>
                                        <p>Bu tumanda bog'chalar topilmadi.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- No Results for Kindergartens -->
                <div id="noKindergartenResults" class="hidden py-10 text-center">
                    <i class="fas fa-search text-gray-300 text-4xl mb-3"></i>
                    <p class="text-gray-500">Qidiruv bo'yicha bog'cha topilmadi.</p>
                </div>
            </div>
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

<!-- JavaScript for search functionality -->
<!-- Include Districts JS -->
<script src="{{ asset('js/districts.js') }}?v={{ filemtime(public_path('js/districts.js')) }}"></script>
</body>
</html>
