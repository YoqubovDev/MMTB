<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maktabgacha Ta'lim Vazirligi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="font-poppins bg-gray-50">
<!-- Navbar -->
<nav class="bg-gradient-to-r from-blue-700 to-indigo-900 text-white shadow-xl sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex-shrink-0 flex items-center">
                <h1 class="text-3xl font-bold tracking-tight">MTV</h1>
            </div>
            <div class="hidden md:flex space-x-10">
                <a href="#" class="relative text-lg font-medium hover:text-blue-200 transition after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-blue-200 after:transition-all after:duration-300 hover:after:w-full">Bosh sahifa</a>
                <a href="#" class="relative text-lg font-medium hover:text-blue-200 transition after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-blue-200 after:transition-all after:duration-300 hover:after:w-full">Yangiliklar</a>
                <a href="#" class="relative text-lg font-medium hover:text-blue-200 transition after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-blue-200 after:transition-all after:duration-300 hover:after:w-full">Hujjatlar</a>
                <a href="#" class="relative text-lg font-medium hover:text-blue-200 transition after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-blue-200 after:transition-all after:duration-300 hover:after:w-full">Bog‘lanish</a>
            </div>
            <div class="hidden md:block">
                <a href="{{route('login')}}" id="loginBtn" class="bg-white text-blue-700 px-6 py-2 rounded-full font-semibold shadow-md hover:bg-blue-100 hover:scale-105 transition-transform duration-300">
                    Kirish
                </a>
            </div>
            <!-- Hamburger Menu -->
            <div class="md:hidden flex items-center">
                <button id="menuBtn" class="text-white focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-indigo-900 text-white px-4 py-6">
        <a href="#" class="block py-2 text-lg font-medium hover:text-blue-200 transition">Bosh sahifa</a>
        <a href="#" class="block py-2 text-lg font-medium hover:text-blue-200 transition">Yangiliklar</a>
        <a href="#" class="block py-2 text-lg font-medium hover:text-blue-200 transition">Hujjatlar</a>
        <a href="#" class="block py-2 text-lg font-medium hover:text-blue-200 transition">Bog‘lanish</a>
        <a href="{{route('login')}}" class="block mt-4 bg-white text-blue-700 px-6 py-2 rounded-full font-semibold text-center hover:bg-blue-100 transition">Kirish</a>
    </div>
</nav>

<!-- Hero Section -->
<section class="bg-gradient-to-br from-blue-100 via-white to-indigo-100 py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center gap-12">
        <div class="md:w-1/2 text-center md:text-left">
            <h2 class="text-5xl font-extrabold text-gray-900 mb-6 leading-tight animate-fade-in-up">
                Maktabgacha Ta'limning <span class="text-blue-600">Kelajagi</span>
            </h2>
            <p class="text-xl text-gray-600 mb-8 leading-relaxed animate-fade-in-up delay-100">
                Bolalarimiz uchun sifatli ta’lim va innovatsion yechimlar bilan kelajakni birgalikda quramiz!
            </p>
            <div class="flex justify-center md:justify-start gap-4">
                <a href="#" id="exploreBtn" class="bg-blue-600 text-white px-8 py-4 rounded-full font-semibold text-lg shadow-lg hover:bg-blue-700 hover:scale-105 transition-transform duration-300">
                    Ko‘proq bilib oling
                </a>
                <a href="{{route('login')}}" class="bg-transparent border-2 border-blue-600 text-blue-600 px-8 py-4 rounded-full font-semibold text-lg hover:bg-blue-600 hover:text-white transition-colors duration-300">
                    Tizimga kirish
                </a>
            </div>
        </div>
        <div class="md:w-1/2">
            <img src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Ta'lim" class="rounded-2xl shadow-2xl transform hover:scale-105 transition-transform duration-500">
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center text-gray-900 mb-16 animate-fade-in">Bizning afzalliklarimiz</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="relative p-8 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="text-blue-600 text-5xl mb-6 transform hover:rotate-12 transition-transform duration-300">📚</div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Sifatli Ta'lim</h3>
                <p class="text-gray-600 leading-relaxed">Zamonaviy metodlar va tajribali o‘qituvchilar yordamida eng yaxshi ta’lim tajribasi.</p>
            </div>
            <div class="relative p-8 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="text-blue-600 text-5xl mb-6 transform hover:rotate-12 transition-transform duration-300">🌟</div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Innovatsiyalar</h3>
                <p class="text-gray-600 leading-relaxed">Raqamli platformalar va yangi yondashuvlar bilan ta’limni rivojlantiramiz.</p>
            </div>
            <div class="relative p-8 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="text-blue-600 text-5xl mb-6 transform hover:rotate-12 transition-transform duration-300">🤝</div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Hamkorlik</h3>
                <p class="text-gray-600 leading-relaxed">Ota-onalar va jamoatchilik bilan yaqin hamkorlik orqali muvaffaqiyatga erishamiz.</p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gradient-to-r from-blue-900 to-indigo-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            <div>
                <h3 class="text-2xl font-bold mb-6">Maktabgacha Ta'lim Vazirligi</h3>
                <p class="text-gray-300 leading-relaxed">Bolalarimizning kelajagi uchun birgalikda harakat qilamiz!</p>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-6">Tez havolalar</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-gray-300 hover:text-blue-200 transition">Yangiliklar</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-blue-200 transition">Hujjatlar</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-blue-200 transition">Bog‘lanish</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-6">Bog‘lanish</h3>
                <p class="text-gray-300 mb-2">Email: <a href="mailto:info@mtv.uz" class="hover:text-blue-200">info@mtv.uz</a></p>
                <p class="text-gray-300">Telefon: <a href="tel:+998711234567" class="hover:text-blue-200">+998 71 123 45 67</a></p>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-6">Bizni kuzating</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-300 hover:text-blue-200 text-2xl"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-300 hover:text-blue-200 text-2xl"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-300 hover:text-blue-200 text-2xl"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-300 hover:text-blue-200 text-2xl"><i class="fab fa-telegram"></i></a>
                </div>
            </div>
        </div>
        <div class="mt-12 text-center border-t border-blue-800 pt-6">
            <p class="text-gray-300">© 2025 Maktabgacha Ta'lim Vazirligi. Barcha huquqlar himoyalangan.</p>
        </div>
    </div>
</footer>

<!-- JavaScript -->
<script>
    // Hamburger Menu Toggle
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Explore Button Animation
    const exploreBtn = document.getElementById('exploreBtn');
    exploreBtn.addEventListener('click', () => {
        exploreBtn.classList.add('animate-pulse');
        setTimeout(() => {
            exploreBtn.classList.remove('animate-pulse');
        }, 1000);
    });
</script>

<!-- Custom Animation Styles -->
<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up { animation: fadeInUp 0.6s ease-out forwards; }
    .delay-100 { animation-delay: 0.1s; }
</style>
</body>
</html>
