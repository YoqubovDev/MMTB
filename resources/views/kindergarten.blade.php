<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTV - {{ ucfirst(request()->query('district', 'Boqcha')) }} Boqchalari</title>
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
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" id="logoutBtn" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                            Chiqish
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                        Kirish
                    </a>
                @endauth
            </div>
            <div class="md:hidden flex items-center">
                <button id="menuBtn" class="text-white focus:outline-none" aria-label="Menyuni ochish">
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
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" id="mobileLogoutBtn" class="block mt-6 bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold text-center hover:shadow-lg transition">Chiqish</button>
            </form>
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
                {{ ucfirst(request()->query('district', 'Tuman')) }} Boqchalar
            </h2>
            @auth
                <button onclick="openModal('addKindergartenModal')" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-4 rounded-full font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300" aria-label="Yangi boqcha qo'shish">
                    <i class="fas fa-plus mr-2"></i> Boqcha Qo'shish
                </button>
            @endauth
        </div>
        <div class="flex justify-center mb-12">
            <div class="relative w-full max-w-md">
                <input type="text" id="searchInput" placeholder="Boqcha qidirish..." class="w-full px-6 py-4 rounded-full bg-white text-gray-900 border-2 border-blue-200 focus:border-blue-600 focus:outline-none shadow-lg transition-all duration-300" value="{{ request()->query('search', '') }}" aria-label="Boqcha qidirish">
                <span class="absolute right-6 top-1/2 transform -translate-y-1/2 text-blue-600">
                        <i class="fas fa-search"></i>
                    </span>
            </div>
        </div>
        <!-- Kindergarten List -->
        <div id="kindergartensList" class="space-y-6">
            @forelse($kindergartens ?? [] as $kindergarten)
                <div class="flex flex-col sm:flex-row items-center p-6 bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 w-full" data-kindergarten-name="{{ $kindergarten->boqcha_raqami }}">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mr-0 sm:mr-6 mb-4 sm:mb-0">
                        <i class="fas fa-school text-white text-2xl"></i>
                    </div>
                    <div class="flex-1 text-center sm:text-left">
                        <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ $kindergarten->boqcha_raqami }}-boqcha</h4>
                        <p class="text-gray-600">MFY: {{ $kindergarten->mfy ?? 'Ma\'lumot yo\'q' }}</p>
                        <p class="text-gray-600">Qurilgan yili: {{ $kindergarten->qurilgan_yili ?? 'Ma\'lumot yo\'q' }}</p>
                        <p class="text-gray-600">Tuman: {{ $kindergarten->district?->name ?? 'Ma\'lumot yo\'q' }}</p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3 mt-4 sm:mt-0">
                        <a href="{{ route('data', $kindergarten->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 transition-all duration-300 text-center" aria-label="Boqcha ma'lumotlarini ko'rish">
                            <i class="fas fa-eye"></i> Ko'rish
                        </a>
                        @auth
                            <a href="javascript:void(0)" onclick="openModal('editKindergartenModal-{{ $kindergarten->id }}')" class="bg-yellow-500 text-white px-4 py-2 rounded-full hover:bg-yellow-600 transition-all duration-300 text-center" aria-label="Boqchani tahrirlash">
                                <i class="fas fa-edit"></i> Tahrirlash
                            </a>
                            <form method="POST" action="{{ route('kindergarten.destroy', $kindergarten->id) }}" onsubmit="return confirm('Rostdan o\'chirmoqchimisiz?');" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition-all duration-300" aria-label="Boqchani o'chirish">
                                    <i class="fas fa-trash"></i> O'chirish
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
                    <p class="text-gray-600 text-lg">Boqchalar topilmadi</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Add Kindergarten Modal -->
<div id="addKindergartenModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden" role="dialog" aria-labelledby="addKindergartenModalTitle" aria-modal="true">
    <div class="bg-white rounded-3xl p-6 sm:p-8 max-w-3xl w-full mx-4 sm:mx-auto shadow-2xl animate-fade-in-up overflow-y-auto max-h-[80vh]">
        <h3 id="addKindergartenModalTitle" class="text-2xl font-bold text-gray-900 mb-6">Yangi Boqcha Qo‘shish</h3>
        <form method="POST" action="{{ route('kindergarten.store') }}" enctype="multipart/form-data" id="addKindergartenForm">
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
            @include('partials.kindergarten-form', ['prefix' => 'add_', 'kindergarten' => null, 'districts' => $districts ?? []])
            <div class="flex justify-end gap-4 mt-6">
                <button type="button" onclick="closeModal('addKindergartenModal')" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-full font-semibold hover:bg-gray-300 transition-all duration-300" aria-label="Bekor qilish">Bekor qilish</button>
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-full font-semibold shadow-lg hover:shadow-xl transition-all duration-300" aria-label="Boqcha qo'shish">Qo‘shish</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Kindergarten Modals -->
@forelse($kindergartens ?? [] as $kindergarten)
    <div id="editKindergartenModal-{{ $kindergarten->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden" role="dialog" aria-labelledby="editKindergartenModalTitle-{{ $kindergarten->id }}" aria-modal="true">
        <div class="bg-white rounded-3xl p-6 sm:p-8 max-w-3xl w-full mx-4 sm:mx-auto shadow-2xl animate-fade-in-up overflow-y-auto max-h-[80vh]">
            <h3 id="editKindergartenModalTitle-{{ $kindergarten->id }}" class="text-2xl font-bold text-gray-900 mb-6">Boqchani Tahrirlash</h3>
            <form method="POST" action="{{ route('kindergarten.update', $kindergarten->id) }}" enctype="multipart/form-data" id="editKindergartenForm-{{ $kindergarten->id }}">
                @csrf
                @method('PUT')
                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc pl-5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @include('partials.kindergarten-form', ['prefix' => 'edit_' . $kindergarten->id . '_', 'kindergarten' => $kindergarten, 'districts' => $districts ?? []])
                <div class="flex justify-end gap-4 mt-6">
                    <button type="button" onclick="closeModal('editKindergartenModal-{{ $kindergarten->id }}')" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-full font-semibold hover:bg-gray-300 transition-all duration-300" aria-label="Bekor qilish">Bekor qilish</button>
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-full font-semibold shadow-lg hover:shadow-xl transition-all duration-300" aria-label="Saqlash">Saqlash</button>
                </div>
            </form>
        </div>
    </div>
@empty
    <!-- No kindergartens to edit -->
@endforelse

<!-- Footer -->
<footer class="bg-gradient-to-br from-blue-900 to-indigo-950 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-16">
            <div>
                <h3 class="text-3xl font-extrabold mb-6 bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-indigo-600">Boqchagacha Ta'lim</h3>
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
                    <a href="#" class="text-gray-300 hover:text-blue-300 text-3xl hover:scale-110 transition-transform duration-300" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-300 hover:text-blue-300 text-3xl hover:scale-110 transition-transform duration-300" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-300 hover:text-blue-300 text-3xl hover:scale-110 transition-transform duration-300" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-300 hover:text-blue-300 text-3xl hover:scale-110 transition-transform duration-300" aria-label="Telegram"><i class="fab fa-telegram"></i></a>
                </div>
            </div>
        </div>
        <div class="mt-16 text-center border-t border-blue-800 pt-8">
            <p class="text-gray-300">© 2025 Boqchagacha Ta'lim Vazirligi. Barcha huquqlar himoyalangan.</p>
        </div>
    </div>
</footer>

<!-- JavaScript -->
<script src="{{ asset('js/app.js') }}"></script>

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
