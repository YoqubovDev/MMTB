<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTV - Maktablar</title>
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
                <a href="select.html" class="bg-white text-blue-600 px-4 py-2 rounded-full font-semibold hover:bg-blue-100 transition">
                    Orqaga
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<section class="flex-grow py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Search Bar -->
        <div class="mb-10 flex justify-center">
            <div class="relative w-full max-w-xl">
                <input
                    type="text"
                    id="searchInput"
                    placeholder="Maktab nomini kiriting..."
                    class="w-full px-4 py-3 pl-12 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                >
                <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
            </div>
        </div>

        <!-- Districts Section -->
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Toshkent shahri tumanlari</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="districtsList">
            <!-- Tumanlar ro‘yxati dinamik ravishda JavaScript orqali qo‘shiladi -->
        </div>

        <!-- Schools List (Hidden initially) -->
        <div id="schoolsSection" class="hidden mt-10">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6" id="districtName"></h3>
            <div id="schoolsList" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Maktablar ro‘yxati dinamik ravishda qo‘shiladi -->
            </div>
            <button
                id="backToDistricts"
                class="mt-6 bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition"
            >
                Tumanlarga qaytish
            </button>
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
    // Toshkent shahri tumanlari ro‘yxati
    const districts = [
        "Bektemir", "Chilonzor", "Mirobod", "Mirzo Ulug‘bek",
        "Olmazor", "Sergeli", "Shayxontohur", "Uchtepa",
        "Yakkasaroy", "Yangixayot", "Yashnobod", "Yunusobod"
    ];

    // Tumanlar ro‘yxatini ko‘rsatish
    const districtsList = document.getElementById('districtsList');
    districts.forEach(district => {
        const card = document.createElement('div');
        card.className = 'bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition cursor-pointer transform hover:-translate-y-2';
        card.innerHTML = `
                <i class="fas fa-city text-4xl text-blue-600 mb-4"></i>
                <h3 class="text-lg font-semibold text-gray-800">${district}</h3>
            `;
        card.addEventListener('click', () => showSchools(district));
        districtsList.appendChild(card);
    });

    // Maktablar ro‘yxatini ko‘rsatish (taqlidiy ma’lumotlar)
    function showSchools(district) {
        const schoolsSection = document.getElementById('schoolsSection');
        const districtName = document.getElementById('districtName');
        const schoolsList = document.getElementById('schoolsList');
        districtsList.classList.add('hidden');
        schoolsSection.classList.remove('hidden');

        districtName.textContent = `${district} tumani maktablari`;

        // Taqlidiy maktablar ro‘yxati (haqiqiy loyihada bu ma’lumotlar bazadan olinadi)
        const schools = [
            { name: `${district} 1-son maktab`, address: "Ko‘cha 1" },
            { name: `${district} 2-son maktab`, address: "Ko‘cha 2" },
            { name: `${district} 3-son maktab`, address: "Ko‘cha 3" },
        ];

        schoolsList.innerHTML = '';
        schools.forEach(school => {
            const card = document.createElement('div');
            card.className = 'bg-blue-50 p-6 rounded-lg shadow-md hover:shadow-lg transition';
            card.innerHTML = `
                    <h4 class="text-lg font-semibold text-gray-800 mb-2">${school.name}</h4>
                    <p class="text-gray-600">${school.address}</p>
                `;
            schoolsList.appendChild(card);
        });
    }

    // Tumanlarga qaytish tugmasi
    document.getElementById('backToDistricts').addEventListener('click', () => {
        document.getElementById('schoolsSection').classList.add('hidden');
        districtsList.classList.remove('hidden');
        document.getElementById('searchInput').value = ''; // Qidiruv maydonini tozalash
    });

    // Qidiruv funksiyasi
    document.getElementById('searchInput').addEventListener('input', (e) => {
        const searchTerm = e.target.value.toLowerCase();
        const districtCards = districtsList.children;

        Array.from(districtCards).forEach(card => {
            const districtName = card.querySelector('h3').textContent.toLowerCase();
            card.style.display = districtName.includes(searchTerm) ? 'block' : 'none';
        });
    });
</script>
</body>
</html>
