<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTV - Bog'cha ma'lumotlarini tahrirlash</title>
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
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-gray-900 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">
                Bog'cha ma'lumotlarini tahrirlash
            </h2>
            <p class="mt-2 text-gray-600">{{ $kindergarten->name }}</p>
        </div>
        
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-md">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-red-500 mt-1"></i>
                    </div>
                    <div class="ml-3">
                        <p class="font-medium">Quyidagi xatoliklarni to'g'rilang:</p>
                        <ul class="mt-2 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <div class="p-8">
                <form action="{{ route('kindergartens.update', $kindergarten) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-6">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Bog'cha nomi <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="name" value="{{ old('name', $kindergarten->name) }}" required 
                                class="w-full px-4 py-3 rounded-lg bg-gray-50 text-gray-900 border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none transition-colors">
                        </div>
                        
                        <!-- District -->
                        <div>
                            <label for="district_id" class="block text-sm font-medium text-gray-700 mb-1">Tuman <span class="text-red-500">*</span></label>
                            <select name="district_id" id="district_id" required
                                class="w-full px-4 py-3 rounded-lg bg-gray-50 text-gray-900 border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none transition-colors">
                                <option value="">Tumanni tanlang</option>
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}" {{ old('district_id', $kindergarten->district_id) == $district->id ? 'selected' : '' }}>
                                        {{ $district->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Address -->
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Manzil <span class="text-red-500">*</span></label>
                            <input type="text" name="address" id="address" value="{{ old('address', $kindergarten->address) }}" required 
                                class="w-full px-4 py-3 rounded-lg bg-gray-50 text-gray-900 border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none transition-colors">
                        </div>
                        
                        <!-- Grid for contact and email -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="contact_number" class="block text-sm font-medium text-gray-700 mb-1">Telefon raqami <span class="text-red-500">*</span></label>
                                <input type="text" name="contact_number" id="contact_number" value="{{ old('contact_number', $kindergarten->contact_number) }}" required 
                                    class="w-full px-4 py-3 rounded-lg bg-gray-50 text-gray-900 border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none transition-colors"
                                    placeholder="+998 XX XXX XX XX">
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                                <input type="email" name="email" id="email" value="{{ old('email', $kindergarten->email) }}" required 
                                    class="w-full px-4 py-3 rounded-lg bg-gray-50 text-gray-900 border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none transition-colors"
                                    placeholder="bogcha@example.com">
                            </div>
                        </div>
                        
                        <!-- Director name -->
                        <div>
                            <label for="director_name" class="block text-sm font-medium text-gray-700 mb-1">Direktor ismi <span class="text-red-500">*</span></label>
                            <input type="text" name="director_name" id="director_name" value="{{ old('director_name', $kindergarten->director_name) }}" required 
                                class="w-full px-4 py-3 rounded-lg bg-gray-50 text-gray-900 border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none transition-colors">
                        </div>
                        
                        <!-- Grid for capacity and age range -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="capacity" class="block text-sm font-medium text-gray-700 mb-1">Bolalar sig'imi <span class="text-red-500">*</span></label>
                                <input type="number" name="capacity" id="capacity" value="{{ old('capacity', $kindergarten->capacity) }}" required min="1"
                                    class="w-full px-4 py-3 rounded-lg bg-gray-50 text-gray-900 border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none transition-colors">
                            </div>
                            
                            <div>
                                <label for="age_range" class="block text-sm font-medium text-gray-700 mb-1">Yosh chegarasi <span class="text-red-500">*</span></label>
                                <input type="text" name="age_range" id="age_range" value="{{ old('age_range', $kindergarten->age_range) }}" required
                                    class="w-full px-4 py-3 rounded-lg bg-gray-50 text-gray-900 border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none transition-colors"
                                    placeholder="3-7 yosh">
                            </div>
                        </div>
                        
                        <!-- Hidden status field -->
                        <input type="hidden" name="status" value="1">
                        
                        <!-- Submit & Cancel buttons -->
                        <div class="flex justify-end space-x-4 pt-4">
                            <a href="{{ route('kindergartens.show', $kindergarten) }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-medium border border-gray-300 hover:bg-gray-200 transition-colors duration-200">
                                Bekor qilish
                            </a>
                            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-lg font-medium hover:shadow-lg transition-all duration-200">
                                <i class="fas fa-save mr-2"></i> Saqlash
                            </button>
                        </div>
                    </div>
                </form>
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
                    <li><a href="{{ route('welcome') }}" class="text-gray-300

