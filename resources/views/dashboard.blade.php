<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTV - Tanlov</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="font-poppins bg-gray-100 min-h-screen flex flex-col">
<!-- Navbar -->
<nav class="bg-gradient-to-r from-blue-600 to-blue-800 text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex-shrink-0">
                <h1 class="text-2xl font-bold">MTV</h1>
            </div>
            <div>
                <a href="#" id="logoutBtn" class="bg-white text-blue-600 px-4 py-2 rounded-full font-semibold hover:bg-blue-100 transition">
                    Chiqish
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<section class="flex-grow flex items-center justify-center py-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Muassasa turini tanlang</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Maktab Card -->
            <a href="" class="block">
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition cursor-pointer transform hover:-translate-y-2">
                    <i class="fas fa-school text-5xl text-blue-600 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Maktab</h3>
                    <p class="text-gray-600">Maktablar uchun maxsus xizmatlar va resurslar.</p>
                </div>
            </a>
            <!-- Bog‘cha Card -->
            <a href="/kindergarten-region" class="block">
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition cursor-pointer transform hover:-translate-y-2">
                    <i class="fas fa-child text-5xl text-blue-600 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Bog‘cha</h3>
                    <p class="text-gray-600">Maktabgacha ta’lim muassasalari uchun xizmatlar.</p>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-blue-800 text-white py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-gray-300">© 2025 Maktabgacha Ta'lim Vazirligi. Barcha huquqlar himoyalangan.</p>
    </div>
</footer>

<!-- JavaScript -->
<script>
    // Chiqish tugmasi
    document.getElementById('logoutBtn').addEventListener('click', (e) => {
        e.preventDefault();
        if (confirm('Chiqishni xohlaysizmi?')) {
            alert('Tizimdan chiqildi.');
            window.location.href = 'login.html'; // Login sahifasiga qaytish
        }
    });
</script>
</body>
</html>
