<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bog‘chalar')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
</head>
<body class="font-inter bg-gray-50 min-h-screen flex flex-col overflow-x-hidden">
<!-- Navbar -->
<nav class="bg-transparent text-white fixed top-0 w-full z-50 transition-all duration-300" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="text-2xl font-bold">Bog‘chalar</a>
                </div>
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
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <a href="{{ route('welcome') }}" class="px-3 py-2 text-sm font-medium hover:text-blue-300">Bosh sahifa</a>
                <a href="{{ route('kindergarten-region') }}" class="px-3 py-2 text-sm font-medium hover:text-blue-300">Tumanlar</a>
            </div>
            <div class="-mr-2 flex items-center sm:hidden">
                <button id="menuBtn" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-blue-700">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="hidden sm:hidden" id="mobileMenu">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('welcome') }}" class="block pl-3 pr-4 py-2 text-base font-medium hover:bg-blue-700">Bosh sahifa</a>
            <a href="{{ route('kindergarten-region') }}" class="block pl-3 pr-4 py-2 text-base font-medium hover:bg-blue-700">Tumanlar</a>
        </div>
    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-gradient-to-r from-blue-900 to-indigo-900 text-white px-6 py-8 animate-slide-in">
        <a href="/" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Bosh sahifa</a>
        <a href="#" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Yangiliklar</a>
        <a href="#" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Hujjatlar</a>
        <a href="#" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Bog‘lanish</a>
        <a href="#" id="mobileLogoutBtn" class="block mt-6 bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold text-center hover:shadow-lg transition">Chiqish</a>
    </div>
</nav>

<!-- Main Content -->
<section class="flex-grow py-32 relative bg-gradient-to-br from-blue-50 via-white to-indigo-50">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1')] bg-cover bg-center opacity-10"></div>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        @if (isset($error))
            <div class="bg-red-50 border-2 border-red-100 rounded-xl p-8 text-center shadow-lg">
                <i class="fas fa-exclamation-circle text-6xl text-red-400 mb-4"></i>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Xatolik yuz berdi</h3>
                <p class="text-gray-600">{{ $error }}</p>
            </div>
        @else
            <h2 class="text-5xl font-extrabold text-gray-900 mb-12 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600 animate-fade-in-up">
                Tumanlar bo‘yicha bog‘chalar
            </h2>
            <div class="flex flex-col md:flex-row items-center justify-center gap-4 mb-12">
                <div class="relative w-full max-w-lg">
                    <input type="text" id="searchInput" placeholder="Bog‘cha qidirish..." class="w-full px-6 py-4 rounded-full bg-white text-gray-900 border-2 border-blue-200 focus:border-blue-600 focus:outline-none shadow-lg transition-all duration-300">
                    <i class="fas fa-search absolute right-6 top-1/2 transform -translate-y-1/2 text-blue-600"></i>
                </div>
                <div class="flex flex-wrap justify-center gap-2 mt-4 md:mt-0">
                    <button id="exportExcel" class="px-4 py-3 rounded-full bg-gradient-to-r from-green-500 to-green-600 text-white font-medium shadow-md hover:shadow-lg hover:scale-105 transition-all duration-300 flex items-center">
                        <i class="fas fa-file-excel mr-2"></i> Excel
                    </button>
                    <button id="exportCSV" class="px-4 py-3 rounded-full bg-gradient-to-r from-yellow-500 to-yellow-600 text-white font-medium shadow-md hover:shadow-lg hover:scale-105 transition-all duration-300 flex items-center">
                        <i class="fas fa-file-csv mr-2"></i> CSV
                    </button>
                </div>
            </div>

            <div id="kindergartensContainer" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($districts as $district)
                    <a href="{{ route('districts.show', $district->id) }}" class="block">
                        <div class="px-6 py-4 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-lg font-semibold text-center shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                            {{ $district->name }}
                            <span class="text-xs block mt-1 text-blue-200">Bog‘chalar: {{ $district->kindergartens_count }}</span>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="bg-blue-50 border-2 border-blue-100 rounded-xl p-8 inline-block shadow-lg">
                            <i class="fas fa-school text-6xl text-blue-400 mb-4"></i>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Tumanlar mavjud emas</h3>
                            <p class="text-gray-600">Hozircha tumanlar topilmadi.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        @endif
    </div>
</section>

<!-- Footer -->
<footer class="bg-gradient-to-br from-blue-900 to-indigo-950 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-lg font-semibold mb-4">Bog‘chalar</h3>
                <p class="text-gray-300">O‘zbekiston Respublikasi bo‘yicha barcha bog‘chalar haqida ma’lumot.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Havolalar</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('welcome') }}" class="hover:text-blue-300">Bosh sahifa</a></li>
                    <li><a href="{{ route('kindergarten-region') }}" class="hover:text-blue-300">Tumanlar</a></li>
                <h3 class="text-2xl font-semibold mb-6">Tez havolalar</h3>
                <ul class="space-y-4">
                    <li><a href="/" class="text-gray-300 hover:text-blue-300 hover:translate-x-2 transition-all duration-300">Bosh sahifa</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-blue-300 hover:translate-x-2 transition-all duration-300">Yangiliklar</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-blue-300 hover:translate-x-2 transition-all duration-300">Hujjatlar</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-blue-300 hover:translate-x-2 transition-all duration-300">Bog‘lanish</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Bog‘lanish</h3>
                <p class="text-gray-300">Email: info@bogchalar.uz</p>
                <p class="text-gray-300">Telefon: +998 71 123 45 67</p>
            </div>
        </div>
        <div class="mt-8 border-t border-gray-700 pt-8 text-center">
            <p class="text-gray-400">&copy; {{ date('Y') }} Bog‘chalar. Barcha huquqlar himoyalangan.</p>
        </div>
    </div>
</footer>

<!-- JavaScript -->
<script>
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

    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        mobileMenu.classList.toggle('animate-slide-in');
    });

    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('searchInput');
        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                const searchValue = e.target.value.toLowerCase().trim();
                const districtItems = document.querySelectorAll('#kindergartensContainer > a');
                let matchCount = 0;

                districtItems.forEach(item => {
                    const districtName = item.querySelector('div')?.childNodes[0].textContent.toLowerCase() || '';
                    item.style.display = districtName.includes(searchValue) ? 'block' : 'none';
                    if (districtName.includes(searchValue)) matchCount++;
                });

                const noResultsEl = document.getElementById('noSearchResults');
                if (searchValue && matchCount === 0) {
                    if (!noResultsEl) {
                        const container = document.getElementById('kindergartensContainer');
                        const noResults = document.createElement('div');
                        noResults.id = 'noSearchResults';
                        noResults.className = 'col-span-full text-center py-6';
                        noResults.innerHTML = `
                            <div class="bg-blue-50 border-2 border-blue-100 rounded-xl p-6 inline-block">
                                <i class="fas fa-search text-4xl text-blue-400 mb-3"></i>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Qidiruv natijalari topilmadi</h3>
                                <p class="text-gray-600">Boshqa so
