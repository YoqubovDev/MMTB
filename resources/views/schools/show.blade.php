<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTV - {{ $school->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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

<!-- Main Content -->
<section class="flex-grow py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Action buttons and title -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">
                    {{ $school->name }}
                </h2>
                <p class="mt-2 text-gray-600">{{ $school->district->name }} tumani</p>
            </div>
            <div class="flex space-x-4">
                <a href="{{ route('schools.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-medium border border-gray-300 hover:bg-gray-200 transition-colors duration-200 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Ro'yxatga qaytish
                </a>
                <a href="{{ route('schools.edit', $school) }}" class="px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-lg font-medium hover:shadow-lg transition-all duration-200 flex items-center">
                    <i class="fas fa-edit mr-2"></i> Tahrirlash
                </a>
            </div>
        </div>
        
        <!-- Success message -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-md">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 mr-2"></i>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- School details card -->
        <div class="bg-white rounded-2xl shadow-md overflow-hidden mb-8">
            <div class="border-b border-gray-200">
                <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-indigo-50">
                    <h3 class="text-lg font-semibold text-gray-800">
                        <i class="fas fa-info-circle text-blue-600 mr-2"></i> Asosiy ma'lumotlar
                    </h3>
                </div>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Maktab nomi</p>
                    <p class="text-lg font-medium text-gray-900">{{ $school->name }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Tuman</p>
                    <p class="text-lg font-medium text-gray-900">{{ $school->district->name }}</p>
                </div>
                <div class="md:col-span-2">
                    <p class="text-sm font-medium text-gray-500 mb-1">Manzil</p>
                    <p class="text-lg font-medium text-gray-900">{{ $school->address }}</p>
                </div>
            </div>
        </div>

        <!-- Contact info card -->
        <div class="bg-white rounded-2xl shadow-md overflow-hidden mb-8">
            <div class="border-b border-gray-200">
                <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-indigo-50">
                    <h3 class="text-lg font-semibold text-gray-800">
                        <i class="fas fa-address-book text-blue-600 mr-2"></i> Aloqa ma'lumotlari
                    </h3>
                </div>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Direktor</p>
                    <p class="text-lg font-medium text-gray-900">{{ $school->principal_name }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Telefon raqami</p>
                    <p class="text-lg font-medium text-gray-900">{{ $school->contact_number }}</p>
                </div>
                <div class="md:col-span-2">
                    <p class="text-sm font-medium text-gray-500 mb-1">Email</p>
                    <p class="text-lg font-medium text-gray-900">{{ $school->email }}</p>
                </div>
            </div>
        </div>

        <!-- Capacity card -->
        <div class="bg-white rounded-2xl shadow-md overflow-hidden mb-8">
            <div class="border-b border-gray-200">
                <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-indigo-50">
                    <h3 class="text-lg font-semibold text-gray-800">
                        <i class="fas fa-users text-blue-600 mr-2"></i> Sig'im ma'lumotlari
                    </h3>
                </div>
            </div>
            <div class="p-6">
                <div class="flex items-center">
                    <div class="bg-blue-100 p-4 rounded-xl">
                        <i class="fas fa-user-graduate text-3xl text-blue-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">O'quvchilar sig'imi</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $school->capacity }} <span class="text-base font-normal text-gray-500">o'quvchi</span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete action -->
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Maktabni o'chirish</h3>
                        <p class="text-sm text-gray-600 mt-1">Bu amal maktabni tizimdan o'chiradi. Bu amalni qaytarib bo'lmaydi.</p>
                    </div>
                    <form method="POST" action="{{ route('schools.destroy', $school) }}" onsubmit="return confirm('Maktabni o\'chirishni tasdiqlaysizmi?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-6 py-3 bg-red-600 text-white rounded-lg font-medium hover:bg-red-700 transition-colors duration-200 flex items-center">
                            <i class="fas fa-trash mr-2"></i> O'chirish
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gradient-to-br from-blue-900 to-indigo-950 text-white py-10 mt-12">
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

