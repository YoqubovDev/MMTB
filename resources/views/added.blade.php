<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTV - <?php echo htmlspecialchars(ucfirst($_GET['district'] ?? 'Tuman')); ?> Maktablari</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
            <div class="md:hidden flex items-center">
                <button id="menuBtn" class="text-white focus:outline-none">
                    <i class="fas fa-bars text-3xl"></i>
                </button>
            </div>
        </div>
    </div>
    <div id="mobileMenu" class="hidden md:hidden bg-gradient-to-r from-blue-900 to-indigo-900 text-white px-6 py-8 animate-slide-in">
        <a href="index.html" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Bosh sahifa</a>
        <a href="#" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Yangiliklar</a>
        <a href="#" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Hujjatlar</a>
        <a href="#" class="block py-3 text-lg font-semibold hover:text-blue-300 transition">Bog‘lanish</a>
        <a href="#" id="mobileLogoutBtn" class="block mt-6 bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold text-center hover:shadow-lg transition">Chiqish</a>
    </div>
</nav>

<!-- Main Content -->
<section class="flex-grow py-32 relative bg-gradient-to-br from-blue-50 via-white to-indigo-50">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80')] bg-cover bg-center opacity-10"></div>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex justify-between items-center mb-12">
            <h2 class="text-5xl font-extrabold text-gray-900 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600 animate-fade-in-up">
                <?php echo htmlspecialchars(ucfirst($_GET['district'] ?? 'Tuman')); ?> Maktablari
            </h2>
            <button onclick="document.getElementById('addSchoolModal').classList.remove('hidden')" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-4 rounded-full font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                <i class="fas fa-plus mr-2"></i> Maktab Qo‘shish
            </button>
        </div>
        <div class="flex justify-center mb-12">
            <div class="relative w-full max-w-lg">
                <form method="GET" action="">
                    <input type="hidden" name="district" value="<?php echo htmlspecialchars($_GET['district'] ?? ''); ?>">
                    <input type="text" name="search" placeholder="Maktab qidirish..." class="w-full px-6 py-4 rounded-full bg-white text-gray-900 border-2 border-blue-200 focus:border-blue-600 focus:outline-none shadow-lg transition-all duration-300" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
                    <button type="submit" class="absolute right-6 top-1/2 transform -translate-y-1/2 text-blue-600">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
        <!-- Schools List -->


            <div class="flex items-center p-6 bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mr-6">
                    <i class="fas fa-school text-white text-2xl"></i>
                </div>
                <div class="flex-1">
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">112-maktab</h4>
                    <p class="text-gray-600">MFY: O‘zim toldirman</p>
                    <p class="text-gray-600">Qurilgan yili: 2010</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{route('data')}}"<?php echo urlencode($_GET['district'] ?? ''); ?>" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 transition-all duration-300">
                        <i class="fas fa-eye"></i> Ko‘rish
                    </a>
                    <button onclick="document.getElementById('editSchoolModal-1').classList.remove('hidden')" class="bg-yellow-500 text-white px-4 py-2 rounded-full hover:bg-yellow-600 transition-all duration-300">
                        <i class="fas fa-edit"></i> Tahrirlash
                    </button>
                    <form method="POST" action="delete_school.php" onsubmit="return confirm('Rostdan o‘chirmoqchimisiz?');">
                        <input type="hidden" name="school_id" value="1">
                        <input type="hidden" name="district" value="<?php echo htmlspecialchars($_GET['district'] ?? ''); ?>">
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition-all duration-300">
                            <i class="fas fa-trash"></i> O‘chirish
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal for Adding Added -->
<div id="addSchoolModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-3xl p-8 max-w-2xl w-full shadow-2xl animate-fade-in-up overflow-y-auto max-h-[80vh]">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Yangi Maktab Qo‘shish</h3>
        <form method="POST" action="/added">
            <input type="hidden" name="district" value="<?php echo htmlspecialchars($_GET['district'] ?? ''); ?>">
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="mfy" class="block text-gray-700 font-semibold mb-2">Manzil (MFY)</label>
                    <input type="text" id="mfy" name="mfy" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="qurilgan_yili" class="block text-gray-700 font-semibold mb-2">Qurilgan yili</label>
                    <input type="text" id="qurilgan_yili" name="qurilgan_yili" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="songi_tamir_yili" class="block text-gray-700 font-semibold mb-2">So‘ngi tamirlangan yili</label>
                    <input type="text" id="songi_tamir_yili" name="songi_tamir_yili" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="sektor_raqami" class="block text-gray-700 font-semibold mb-2">Sektor raqami</label>
                    <input type="text" id="sektor_raqami" name="sektor_raqami" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="yer_maydoni" class="block text-gray-700 font-semibold mb-2">Yer maydoni</label>
                    <input type="text" id="yer_maydoni" name="yer_maydoni" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="xudud_oralganligi" class="block text-gray-700 font-semibold mb-2">Xudud o‘ralganligi</label>
                    <input type="text" id="xudud_oralganligi" name="xudud_oralganligi" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="binolar_soni" class="block text-gray-700 font-semibold mb-2">Binolar soni</label>
                    <input type="text" id="binolar_soni" name="binolar_soni" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="binolar_qavatligi" class="block text-gray-700 font-semibold mb-2">Binolar qavatligi</label>
                    <input type="text" id="binolar_qavatligi" name="binolar_qavatligi" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="binolar_maydoni" class="block text-gray-700 font-semibold mb-2">Binolar maydoni</label>
                    <input type="text" id="binolar_maydoni" name="binolar_maydoni" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="istilidigan_maydon" class="block text-gray-700 font-semibold mb-2">Istilidigan maydon</label>
                    <input type="text" id="istilidigan_maydon" name="istilidigan_maydon" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="quvvati" class="block text-gray-700 font-semibold mb-2">Quvvati</label>
                    <input type="text" id="quvvati" name="quvvati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="oquvchi_soni" class="block text-gray-700 font-semibold mb-2">O‘quvchi soni</label>
                    <input type="text" id="oquvchi_soni" name="oquvchi_soni" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="koffsiyent" class="block text-gray-700 font-semibold mb-2">Koffsiyent</label>
                    <input type="text" id="koffsiyent" name="koffsiyent" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="oshxona_yoki_bufet_quvvati" class="block text-gray-700 font-semibold mb-2">Oshxona yoki bufet quvvati</label>
                    <input type="text" id="oshxona_yoki_bufet_quvvati" name="oshxona_yoki_bufet_quvvati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="sport_zal_soni_va_maydoni" class="block text-gray-700 font-semibold mb-2">Sport zal soni va maydoni</label>
                    <input type="text" id="sport_zal_soni_va_maydoni" name="sport_zal_soni_va_maydoni" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="faollar_zali_va_quvvati" class="block text-gray-700 font-semibold mb-2">Faollar zali va quvvati</label>
                    <input type="text" id="faollar_zali_va_quvvati" name="faollar_zali_va_quvvati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="xolati" class="block text-gray-700 font-semibold mb-2">Xolati</label>
                    <input type="text" id="xolati" name="xolati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="tom_xolati_yuzda" class="block text-gray-700 font-semibold mb-2">Tom xolati % da</label>
                    <input type="text" id="tom_xolati_yuzda" name="tom_xolati_yuzda" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="deraza_rom_xolati_yuzda" class="block text-gray-700 font-semibold mb-2">Deraza rom xolati % da</label>
                    <input type="text" id="deraza_rom_xolati_yuzda" name="deraza_rom_xolati_yuzda" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="istish_turi" class="block text-gray-700 font-semibold mb-2">Istish turi</label>
                    <input type="text" id="istish_turi" name="istish_turi" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="qozonlar_soni" class="block text-gray-700 font-semibold mb-2">Qozonlar soni</label>
                    <input type="text" id="qozonlar_soni" name="qozonlar_soni" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="qozonlar_xolati_yuzda" class="block text-gray-700 font-semibold mb-2">Qozonlar xolati % da</label>
                    <input type="text" id="qozonlar_xolati_yuzda" name="qozonlar_xolati_yuzda" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="apoklar_xolati_yuzda" class="block text-gray-700 font-semibold mb-2">Apoklar xolati % da</label>
                    <input type="text" id="apoklar_xolati_yuzda" name="apoklar_xolati_yuzda" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="gaz_istemoli" class="block text-gray-700 font-semibold mb-2">1 yillik o‘rtacha gaz iste’moli</label>
                    <input type="text" id="gaz_istemoli" name="gaz_istemoli" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="elektr_istemoli" class="block text-gray-700 font-semibold mb-2">1 yillik o‘rtacha elektr iste’moli</label>
                    <input type="text" id="elektr_istemoli" name="elektr_istemoli" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="issiqlik_istemoli" class="block text-gray-700 font-semibold mb-2">1 yillik o‘rtacha issiqlik iste’moli</label>
                    <input type="text" id="issiqlik_istemoli" name="issiqlik_istemoli" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="quyosh_paneli" class="block text-gray-700 font-semibold mb-2">Quyosh paneli</label>
                    <input type="text" id="quyosh_paneli" name="quyosh_paneli" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="geokollektor" class="block text-gray-700 font-semibold mb-2">Geokollektor</label>
                    <input type="text" id="geokollektor" name="geokollektor" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="Maktab rassmlari" class="block text-gray-700 font-semibold mb-2">Maktab rasmlari</label>
                    <input type="file" id="maktab_rasmlari" name="maktab_rasmlari" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="O‘zim toldirman">
                </div>
                <div>
                    <label for="lokatsiya" class="block text-gray-700 font-semibold mb-2">Lokatsiya</label>
                    <input type="text" id="lokatsiya" name="lokatsiya" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Silka bo‘ladi">
                </div>
            </div>
            <div class="flex justify-end gap-4 mt-6">
                <button type="button" onclick="document.getElementById('addSchoolModal').classList.add('hidden')" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-full font-semibold hover:bg-gray-300 transition-all duration-300">Bekor qilish</button>
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-full font-semibold shadow-lg hover:shadow-xl transition-all duration-300">Qo‘shish</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal for Editing Added (Placeholder for each school) -->

<!-- Modal for Editing Added 1 -->
<div id="editSchoolModal-1" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-3xl p-8 max-w-2xl w-full shadow-2xl animate-fade-in-up overflow-y-auto max-h-[80vh]">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Maktabni Tahrirlash</h3>
        <form method="POST" action="edit_school.php" enctype="multipart/form-data">
            <input type="hidden" name="school_id" value="1">
            <input type="hidden" name="district" value="<?php echo htmlspecialchars($_GET['district'] ?? ''); ?>">
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="edit_maktab_nomi_1" class="block text-gray-700 font-semibold mb-2">Maktab nomi</label>
                    <input type="text" id="edit_maktab_nomi_1" name="maktab_nomi" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="1-maktab">
                </div>
                <div>
                    <label for="edit_mfy_1" class="block text-gray-700 font-semibold mb-2">Manzil (MFY)</label>
                    <input type="text" id="edit_mfy_1" name="mfy" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="O‘zim toldirman">
                </div>
                <div>
                    <label for="edit_qurilgan_yili_1" class="block text-gray-700 font-semibold mb-2">Qurilgan yili</label>
                    <input type="text" id="edit_qurilgan_yili_1" name="qurilgan_yili" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="1995">
                </div>
                <div>
                    <label for="edit_songi_tamir_yili_1" class="block text-gray-700 font-semibold mb-2">So‘ngi tamirlangan yili</label>
                    <input type="text" id="edit_songi_tamir_yili_1" name="songi_tamir_yili" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 2020">
                </div>
                <div>
                    <label for="edit_sektor_raqami_1" class="block text-gray-700 font-semibold mb-2">Sektor raqami</label>
                    <input type="text" id="edit_sektor_raqami_1" name="sektor_raqami" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 3">
                </div>
                <div>
                    <label for="edit_yer_maydoni_1" class="block text-gray-700 font-semibold mb-2">Yer maydoni</label>
                    <input type="text" id="edit_yer_maydoni_1" name="yer_maydoni" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 5000 m²">
                </div>
                <div>
                    <label for="edit_xudud_oralganligi_1" class="block text-gray-700 font-semibold mb-2">Xudud o‘ralganligi</label>
                    <input type="text" id="edit_xudud_oralganligi_1" name="xudud_oralganligi" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: Ha">
                </div>
                <div>
                    <label for="edit_binolar_soni_1" class="block text-gray-700 font-semibold mb-2">Binolar soni</label>
                    <input type="text" id="edit_binolar_soni_1" name="binolar_soni" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 2">
                </div>
                <div>
                    <label for="edit_binolar_qavatligi_1" class="block text-gray-700 font-semibold mb-2">Binolar qavatligi</label>
                    <input type="text" id="edit_binolar_qavatligi_1" name="binolar_qavatligi" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 3">
                </div>
                <div>
                    <label for="edit_binolar_maydoni_1" class="block text-gray-700 font-semibold mb-2">Binolar maydoni</label>
                    <input type="text" id="edit_binolar_maydoni_1" name="binolar_maydoni" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 3000 m²">
                </div>
                <div>
                    <label for="edit_istilidigan_maydon_1" class="block text-gray-700 font-semibold mb-2">Istilidigan maydon</label>
                    <input type="text" id="edit_istilidigan_maydon_1" name="istilidigan_maydon" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 2500 m²">
                </div>
                <div>
                    <label for="edit_quvvati_1" class="block text-gray-700 font-semibold mb-2">Quvvati</label>
                    <input type="text" id="edit_quvvati_1" name="quvvati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 500 o‘quvchi">
                </div>
                <div>
                    <label for="edit_oquvchi_soni_1" class="block text-gray-700 font-semibold mb-2">O‘quvchi soni</label>
                    <input type="text" id="edit_oquvchi_soni_1" name="oquvchi_soni" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 450">
                </div>
                <div>
                    <label for="edit_koffsiyent_1" class="block text-gray-700 font-semibold mb-2">Koffsiyent</label>
                    <input type="text" id="edit_koffsiyent_1" name="koffsiyent" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 0.9">
                </div>
                <div>
                    <label for="edit_oshxona_yoki_bufet_quvvati_1" class="block text-gray-700 font-semibold mb-2">Oshxona yoki bufet quvvati</label>
                    <input type="text" id="edit_oshxona_yoki_bufet_quvvati_1" name="oshxona_yoki_bufet_quvvati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 100 kishi">
                </div>
                <div>
                    <label for="edit_sport_zal_soni_va_maydoni_1" class="block text-gray-700 font-semibold mb-2">Sport zal soni va maydoni</label>
                    <input type="text" id="edit_sport_zal_soni_va_maydoni_1" name="sport_zal_soni_va_maydoni" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 1, 200 m²">
                </div>
                <div>
                    <label for="edit_faollar_zali_va_quvvati_1" class="block text-gray-700 font-semibold mb-2">Faollar zali va quvvati</label>
                    <input type="text" id="edit_faollar_zali_va_quvvati_1" name="faollar_zali_va_quvvati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 1, 150 kishi">
                </div>
                <div>
                    <label for="edit_xolati_1" class="block text-gray-700 font-semibold mb-2">Xolati</label>
                    <input type="text" id="edit_xolati_1" name="xolati" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: Yaxshi">
                </div>
                <div>
                    <label for="edit_tom_xolati_yuzda_1" class="block text-gray-700 font-semibold mb-2">Tom xolati % da</label>
                    <input type="text" id="edit_tom_xolati_yuzda_1" name="tom_xolati_yuzda" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 90%">
                </div>
                <div>
                    <label for="edit_deraza_rom_xolati_yuzda_1" class="block text-gray-700 font-semibold mb-2">Deraza rom xolati % da</label>
                    <input type="text" id="edit_deraza_rom_xolati_yuzda_1" name="deraza_rom_xolati_yuzda" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 85%">
                </div>
                <div>
                    <label for="edit_istish_turi_1" class="block text-gray-700 font-semibold mb-2">Istish turi</label>
                    <input type="text" id="edit_istish_turi_1" name="istish_turi" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: Gaz">
                </div>
                <div>
                    <label for="edit_qozonlar_soni_1" class="block text-gray-700 font-semibold mb-2">Qozonlar soni</label>
                    <input type="text" id="edit_qozonlar_soni_1" name="qozonlar_soni" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 2">
                </div>
                <div>
                    <label for="edit_qozonlar_xolati_yuzda_1" class="block text-gray-700 font-semibold mb-2">Qozonlar xolati % da</label>
                    <input type="text" id="edit_qozonlar_xolati_yuzda_1" name="qozonlar_xolati_yuzda" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 80%">
                </div>
                <div>
                    <label for="edit_apoklar_xolati_yuzda_1" class="block text-gray-700 font-semibold mb-2">Apoklar xolati % da</label>
                    <input type="text" id="edit_apoklar_xolati_yuzda_1" name="apoklar_xolati_yuzda" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 75%">
                </div>
                <div>
                    <label for="edit_gaz_istemoli_1" class="block text-gray-700 font-semibold mb-2">1 yillik o‘rtacha gaz iste’moli</label>
                    <input type="text" id="edit_gaz_istemoli_1" name="gaz_istemoli" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 5000 m³">
                </div>
                <div>
                    <label for="edit_elektr_istemoli_1" class="block text-gray-700 font-semibold mb-2">1 yillik o‘rtacha elektr iste’moli</label>
                    <input type="text" id="edit_elektr_istemoli_1" name="elektr_istemoli" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 10000 kVt">
                </div>
                <div>
                    <label for="edit_issiqlik_istemoli_1" class="block text-gray-700 font-semibold mb-2">1 yillik o‘rtacha issiqlik iste’moli</label>
                    <input type="text" id="edit_issiqlik_istemoli_1" name="issiqlik_istemoli" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: 2000 Gkal">
                </div>
                <div>
                    <label for="edit_quyosh_paneli_1" class="block text-gray-700 font-semibold mb-2">Quyosh paneli</label>
                    <input type="text" id="edit_quyosh_paneli_1" name="quyosh_paneli" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: Yo‘q">
                </div>
                <div>
                    <label for="edit_geokollektor_1" class="block text-gray-700 font-semibold mb-2">Geokollektor</label>
                    <input type="text" id="edit_geokollektor_1" name="geokollektor" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: Yo‘q">
                </div>
                <div>
                    <label for="edit_maktab_rasmlari_1" class="block text-gray-700 font-semibold mb-2">Maktab rasmlari</label>
                    <input type="file" id="edit_maktab_rasmlari_1" name="maktab_rasmlari" accept="image/*" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300">
                </div>
                <div>
                    <label for="edit_lokatsiya_1" class="block text-gray-700 font-semibold mb-2">Lokatsiya</label>
                    <input type="text" id="edit_lokatsiya_1" name="lokatsiya" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" placeholder="Masalan: Google Maps silka">
                </div>
            </div>

            <div class="flex justify-end gap-4 mt-6">
                <button type="button" onclick="document.getElementById('editSchoolModal-1').classList.add('hidden')" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-full font-semibold hover:bg-gray-300 transition-all duration-300">Bekor qilish</button>
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-full font-semibold shadow-lg hover:shadow-xl transition-all duration-300">Saqlash</button>
            </div>
        </form>
    </div>
</div>

<div id="editSchoolModal-2" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-3xl p-8 max-w-2xl w-full shadow-2xl animate-fade-in-up overflow-y-auto max-h-[80vh]">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Maktabni Tahrirlash</h3>
        <form method="POST" action="edit_school.php">
            <input type="hidden" name="school_id" value="2">
            <input type="hidden" name="district" value="<?php echo htmlspecialchars($_GET['district'] ?? ''); ?>">
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="edit_mfy_2" class="block text-gray-700 font-semibold mb-2">Manzil (MFY)</label>
                    <input type="text" id="edit_mfy_2" name="mfy" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="O‘zim toldirman">
                </div>
                <div>
                    <label for="edit_qurilgan_yili_2" class="block text-gray-700 font-semibold mb-2">Qurilgan yili</label>
                    <input type="text" id="edit_qurilgan_yili_2" name="qurilgan_yili" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="2000">
                </div>
                <!-- Boshqa maydonlar -->
            </div>
            <div class="flex justify-end gap-4 mt-6">
                <button type="button" onclick="document.getElementById('editSchoolModal-2').classList.add('hidden')" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-full font-semibold hover:bg-gray-300 transition-all duration-300">Bekor qilish</button>
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-full font-semibold shadow-lg hover:shadow-xl transition-all duration-300">Saqlash</button>
            </div>
        </form>
    </div>
</div>

<div id="editSchoolModal-3" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-3xl p-8 max-w-2xl w-full shadow-2xl animate-fade-in-up overflow-y-auto max-h-[80vh]">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Maktabni Tahrirlash</h3>
        <form method="POST" action="edit_school.php">
            <input type="hidden" name="school_id" value="3">
            <input type="hidden" name="district" value="<?php echo htmlspecialchars($_GET['district'] ?? ''); ?>">
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="edit_mfy_3" class="block text-gray-700 font-semibold mb-2">Manzil (MFY)</label>
                    <input type="text" id="edit_mfy_3" name="mfy" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="O‘zim toldirman">
                </div>
                <div>
                    <label for="edit_qurilgan_yili_3" class="block text-gray-700 font-semibold mb-2">Qurilgan yili</label>
                    <input type="text" id="edit_qurilgan_yili_3" name="qurilgan_yili" class="w-full px-4 py-3 rounded-lg border-2 border-blue-200 focus:border-blue-600 focus:outline-none transition-all duration-300" value="2010">
                </div>
                <!-- Boshqa maydonlar -->
            </div>
            <div class="flex justify-end gap-4 mt-6">
                <button type="button" onclick="document.getElementById('editSchoolModal-3').classList.add('hidden')" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-full font-semibold hover:bg-gray-300 transition-all duration-300">Bekor qilish</button>
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-full font-semibold shadow-lg hover:shadow-xl transition-all duration-300">Saqlash</button>
            </div>
        </form>
    </div>
</div>

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
                    <li><a href="" class="text-gray-300 hover:text-blue-300 hover:translate-x-2 transition-all duration-300">Bosh sahifa</a></li>
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
    document.querySelector('input[name="search"]').addEventListener('input', (e) => {
        const searchValue = e.target.value.toLowerCase();
        const schools = document.querySelectorAll('#schoolsList > div');

        schools.forEach(school => {
            const schoolName = school.querySelector('h4').textContent.toLowerCase();
            school.style.display = schoolName.includes(searchValue) ? '' : 'none';
        });
    });

    // Dynamic Placeholder Update
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.querySelector('input[name="search"]');
        const path = window.location.pathname.toLowerCase();

        // Update search placeholder based on page type
        if (path.includes('schools') || path.includes('maktab')) {
            searchInput.placeholder = 'Maktab qidirish...';
        } else if (path.includes('kindergartens') || path.includes('bogcha')) {
            searchInput.placeholder = 'Bog‘cha qidirish...';
        } else {
            searchInput.placeholder = 'Qidirish...';
        }
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
