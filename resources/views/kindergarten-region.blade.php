<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTV - Toshkent Tumanlari</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Export libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
</head>
<body class="font-inter bg-gray-50 min-h-screen flex flex-col overflow-x-hidden">
<!-- Navbar -->
<nav class="bg-transparent text-white fixed top-0 w-full z-50 transition-all duration-300" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <div class="flex-shrink-0 flex items-center">
                <h1 class="text-4xl font-extrabold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-indigo-600">MTV</h1>
            </div>
            <div class="hidden md:flex space-x-12">
                <a href="index.html" class="relative text-lg font-semibold text-gray-100 hover:text-blue-300 transition-all duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-blue-300 after:transition-all after:duration-300 hover:after:w-full">Bosh sahifa</a>
                <a href="#" class="relative text-lg font-semibold text-gray-100 hover:text-blue-300 transition-all duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-blue-300 after:transition-all after:duration-300 hover:after:w-full">Yangiliklar</a>
                <a href="#" class="relative text-lg font-semibold text-gray-100 hover:text-blue-300 transition-all duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-blue-300 after:transition-all after:duration-300 hover:after:w-full">Hujjatlar</a>
                <a href="#" class="relative text-lg font-semibold text-gray-100 hover:text-blue-300 transition-all duration-300 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-blue-300 after:transition-all after:duration-300 hover:after:w-full">Bog‘lanish</a>
            </div>
            <div class="hidden md:flex items-center gap-4">
                <a href="#" id="logoutBtn" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                    Chiqish
                </a>
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
        <a href="index.html" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Bosh sahifa</a>
        <a href="#" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Yangiliklar</a>
        <a href="#" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Hujjatlar</a>
        <a href="#" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Bog‘lanish</a>
        <a href="#" id="mobileLogoutBtn" class="block mt-6 bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold text-center hover:shadow-lg transition">Chiqish</a>
    </div>
</nav>

<!-- Main Content -->
<section class="flex-grow flex items-center justify-center py-32 relative bg-gradient-to-br from-blue-50 via-white to-indigo-50">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80')] bg-cover bg-center opacity-10"></div>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        @if(app()->environment() !== 'production')
        <div class="bg-gray-100 border-2 border-gray-300 text-gray-800 p-4 mb-6 rounded shadow-sm text-left">
            <h4 class="font-bold">Debug Information</h4>
            
            <div class="mt-3 p-2 bg-blue-50 rounded border border-blue-200">
                <h5 class="font-semibold text-blue-800">Districts Variable Status:</h5>
                <ul class="list-disc pl-5 mt-1 space-y-1 text-sm">
                    <li>Is Set: <span class="font-mono {{ isset($districts) ? 'text-green-600' : 'text-red-600 font-bold' }}">{{ isset($districts) ? 'Yes' : 'NO - VARIABLE IS UNDEFINED' }}</span></li>
                    @if(isset($districts))
                        <li>Type: <span class="font-mono">{{ is_object($districts) ? get_class($districts) : gettype($districts) }}</span></li>
                        <li>Is Collection: <span class="font-mono {{ $districts instanceof \Illuminate\Support\Collection ? 'text-green-600' : 'text-red-600' }}">{{ $districts instanceof \Illuminate\Support\Collection ? 'Yes' : 'No' }}</span></li>
                        <li>Count: <span class="font-mono">{{ $districts instanceof \Illuminate\Support\Collection ? $districts->count() : 'N/A' }}</span></li>
                        @if($districts instanceof \Illuminate\Support\Collection && $districts->count() > 0)
                            <li>First Item: <code class="bg-gray-100 p-1 text-xs">{{ json_encode($districts->first(), JSON_PRETTY_PRINT) }}</code></li>
                        @endif
                    @endif
                </ul>
            </div>
            
            <div class="mt-3 p-2 bg-yellow-50 rounded border border-yellow-200">
                <h5 class="font-semibold text-yellow-800">Route Information:</h5>
                <ul class="list-disc pl-5 mt-1 space-y-1 text-sm">
                    <li>Route 'added' exists: <span class="font-mono {{ Route::has('added') ? 'text-green-600' : 'text-red-600 font-bold' }}">{{ Route::has('added') ? 'Yes' : 'No' }}</span></li>
                    <li>Route 'kindergarten-region' exists: <span class="font-mono {{ Route::has('kindergarten-region') ? 'text-green-600' : 'text-red-600 font-bold' }}">{{ Route::has('kindergarten-region') ? 'Yes' : 'No' }}</span></li>
                    <li>Current URL: <span class="font-mono">{{ url()->current() }}</span></li>
                </ul>
            </div>
            
            @if(isset($debugMessage))
            <div class="mt-3">
                <h5 class="font-semibold">Controller Debug Output:</h5>
                <pre class="text-xs mt-1 bg-gray-50 p-2 rounded overflow-auto max-h-40 whitespace-pre-wrap">{{ $debugMessage }}</pre>
            </div>
            @endif
            
            @if(isset($executionTime))
            <div class="mt-3 text-xs text-gray-600">
                <strong>Execution time:</strong> {{ $executionTime }}ms
            </div>
            @endif
        </div>
        @endif

        <h2 id="pageHeading" class="text-5xl font-extrabold text-gray-900 mb-12 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600 animate-fade-in-up">
            Toshkent shahri tumanlari
        </h2>
        <div class="flex flex-col md:flex-row items-center justify-center gap-4 mb-12">
            <div class="relative w-full max-w-lg">
                <input type="text" id="searchInput" placeholder="Bog'cha qidirish..." class="w-full px-6 py-4 rounded-full bg-white text-gray-900 border-2 border-blue-200 focus:border-blue-600 focus:outline-none shadow-lg transition-all duration-300">
                <i class="fas fa-search absolute right-6 top-1/2 transform -translate-y-1/2 text-blue-600"></i>
            </div>
            <div class="flex flex-wrap justify-center gap-2 mt-4 md:mt-0">
                <button id="exportExcel" class="px-4 py-3 rounded-full bg-gradient-to-r from-green-500 to-green-600 text-white font-medium shadow-md hover:shadow-lg hover:scale-105 transition-all duration-300 flex items-center">
                    <i class="fas fa-file-excel mr-2"></i> Excel
                </button>
                <button id="exportCSV" class="px-4 py-3 rounded-full bg-gradient-to-r from-yellow-500 to-yellow-600 text-white font-medium shadow-md hover:shadow-lg hover:scale-105 transition-all duration-300 flex items-center">
                    <i class="fas fa-file-csv mr-2"></i> CSV
                </button>
                <button id="exportPDF" class="px-4 py-3 rounded-full bg-gradient-to-r from-red-500 to-red-600 text-white font-medium shadow-md hover:shadow-lg hover:scale-105 transition-all duration-300 flex items-center">
                    <i class="fas fa-file-pdf mr-2"></i> PDF
                </button>
            </div>
        </div>
        
        @if(isset($error))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-8 rounded shadow-md">
            <p class="font-medium">{{ $error }}</p>
            <p class="text-sm mt-2">Iltimos, sahifani yangilang yoki keyinroq qayta urinib ko'ring.</p>
        </div>
        @endif

        @if(!isset($districts))
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-8 rounded shadow-md">
            <p class="font-medium">Ma'lumotlarni yuklashda xatolik</p>
            <p class="text-sm mt-2">Tumanlar ma'lumotlari topilmadi. Iltimos, administrator bilan bog'laning.</p>
        </div>
        @endif
                        Yangihayot
                    </div>
                </div>
            </div>
        </a>
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
                    <li><a href="index.html" class="text-gray-300 hover:text-blue-300 hover:translate-x-2 transition-all duration-300">Bosh sahifa</a></li>
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
    document.getElementById('logoutBtn').addEventListener('click', (e) => {
        e.preventDefault();
        if (confirm('Chiqishni xohlaysizmi?')) {
            alert('Tizimdan chiqildi.');
            window.location.href = 'login.html';
        }
    });

    // Chiqish tugmasi (Mobile)
    document.getElementById('mobileLogoutBtn').addEventListener('click', (e) => {
        e.preventDefault();
        if (confirm('Chiqishni xohlaysizmi?')) {
            alert('Tizimdan chiqildi.');
            window.location.href = 'login.html';
        }
    });

    // Search Functionality
    document.getElementById('searchInput').addEventListener('input', (e) => {
        const searchValue = e.target.value.toLowerCase();
        const buttons = document.querySelectorAll('#districtsContainer a div');
        buttons.forEach(button => {
            const districtName = button.textContent.toLowerCase();
            button.parentElement.style.display = districtName.includes(searchValue) ? 'block' : 'none';
        });
    });
</script>
<script>
    // ... (other existing code like navbar scroll, hamburger menu, etc.)

    // Dynamic Heading and Search Placeholder Update
    document.addEventListener('DOMContentLoaded', () => {
        const heading = document.getElementById('pageHeading');
        const searchInput = document.getElementById('searchInput');
        const path = window.location.pathname.toLowerCase();

        if (path.includes('schools') || path.includes('maktab')) {
            heading.textContent = 'Toshkent shahri maktablari';
            searchInput.placeholder = 'Maktab qidirish...';
        } else if (path.includes('kindergartens') || path.includes('bogcha')) {
            heading.textContent = 'Toshkent shahri bog‘chalari';
            searchInput.placeholder = 'Bog‘cha qidirish...';
        } else {
            heading.textContent = 'Toshkent shahri tumanlari';
            searchInput.placeholder = 'Qidirish...';
        }
    });

    // Search Functionality
    document.getElementById('searchInput').addEventListener('input', (e) => {
        const searchValue = e.target.value.toLowerCase();
        const buttons = document.querySelectorAll('#districtsContainer .block div');
        buttons.forEach(button => {
            const districtName = button.textContent.toLowerCase();
            button.parentElement.style.display = districtName.includes(searchValue) ? 'block' : 'none';
        });
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
