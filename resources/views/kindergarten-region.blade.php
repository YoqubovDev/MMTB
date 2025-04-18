<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTV - {{ ucfirst(request()->query('district', 'Tuman')) }} Boqchalari</title>
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
                        <button type="submit" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300" aria-label="Tizimdan chiqish">
                            Chiqish
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300" aria-label="Tizimga kirish">
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
                <button type="submit" class="block mt-6 bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold text-center hover:shadow-lg transition" aria-label="Tizimdan chiqish">
                    Chiqish
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block mt-6 bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full font-semibold text-center hover:shadow-lg transition" aria-label="Tizimga kirish">
                Kirish
            </a>
        @endauth
    </div>
</nav>

<!-- Main Content -->
<section class="flex-grow py-32 relative bg-gradient-to-br from-blue-50 via-white to-indigo-50">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80')] bg-cover bg-center opacity-10"></div>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-12 gap-4">
            <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600 animate-fade-in-up">
                {{ ucfirst(request()->query('district', 'Tuman')) }} Boqchalari
            </h2>
            @auth
                <button onclick="openModal('addKindergartenModal')" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-4 rounded-full font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300" aria-label="Yangi boqcha qo'shish">
                    <i class="fas fa-plus mr-2"></i> Boqcha Qo'shish
                </button>
            @endauth
        </div>
        <div class="flex justify-center mb-12">
            <div class="relative w-full max-w-md">
                <form method="GET" action="{{ url()->current() }}">
                    <input type="hidden" name="district" value="{{ request()->query('district', '') }}">
                    <input type="text" name="search" id="searchInput" placeholder="Boqcha qidirish..." class="w-full px-6 py-4 rounded-full bg-white text-gray-900 border-2 border-blue-200 focus:border-blue-600 focus:outline-none shadow-lg transition-all duration-300" value="{{ request()->query('search', '') }}" aria-label="Boqcha qidirish">
                    <button type="submit" class="absolute right-6 top-1/2 transform -translate-y-1/2 text-blue-600" aria-label="Qidirish">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
        <!-- Kindergarten List -->
        <div id="kindergartensList" class="space-y-6">
            @forelse($kindergartens ?? [] as $kindergarten)
                <div class="flex flex-col sm:flex-row items-center p-6 bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 w-full" data-kindergarten-name="{{ $kindergarten->boqcha_raqami }}">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mr-0 sm:mr-6 mb-4 sm:mb-0">
                        <i class="fas fa-child text-white text-2xl"></i>
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
                        <i class="fas fa-child text-gray-400 text-2xl"></i>
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
        <form method="POST" action="{{ route('kindergarten.store') }}" enctype="multipart/form-data">
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
            <form method="POST" action="{{ route('kindergarten.update', $kindergarten->id) }}" enctype="multipart/form-data">
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

    // Search Functionality (removed duplicate)
    // This function is replaced by the improved version below
</script>
<script>
    // Dynamic Heading and Search Placeholder Update
    document.addEventListener('DOMContentLoaded', () => {
        const heading = document.getElementById('pageHeading');
        const searchInput = document.getElementById('searchInput');
        const path = window.location.pathname.toLowerCase();

        if (path.includes('kindergartens') || path.includes('kindergarten')) {
            heading.textContent = 'Toshkent shahri boqchlari';
            searchInput.placeholder = 'kindergarten qidirish...';
        } else if (path.includes('kindergartens') || path.includes('boqcha')) {
            heading.textContent = 'Toshkent shahri boqchalari';
            searchInput.placeholder = 'boqcha qidirish...';
        } else {
            heading.textContent = 'Toshkent shahri tumanlari';
            searchInput.placeholder = 'Qidirish...';
        }

        // Improved Search Functionality
        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                const searchValue = e.target.value.toLowerCase().trim();
                const districtItems = document.querySelectorAll('.district-link');

                if (districtItems.length === 0) {
                    console.log('No district items found to search');
                    return;
                }

                let matchCount = 0;

                districtItems.forEach(item => {
                    const districtName = item.getAttribute('data-district-name')?.toLowerCase() || '';
                    const hasMatch = districtName.includes(searchValue);

                    // Show/hide based on search
                    item.style.display = hasMatch ? 'block' : 'none';

                    if (hasMatch) matchCount++;
                });

                // Show no results message if needed
                const noResultsEl = document.getElementById('noSearchResults');
                if (searchValue && matchCount === 0) {
                    // Create message if it doesn't exist
                    if (!noResultsEl) {
                        const container = document.getElementById('districtsContainer');
                        const noResults = document.createElement('div');
                        noResults.id = 'noSearchResults';
                        noResults.className = 'col-span-full text-center py-6';
                        noResults.innerHTML = `
                            <div class="bg-blue-50 border-2 border-blue-100 rounded-xl p-6 inline-block">
                                <i class="fas fa-search text-4xl text-blue-400 mb-3"></i>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Qidiruv natijalari topilmadi</h3>
                                <p class="text-gray-600">Boshqa so'zlar bilan qayta urinib ko'ring</p>
                            </div>
                        `;
                        container.appendChild(noResults);
                    }
                } else if (noResultsEl) {
                    noResultsEl.remove();
                }
            });
        }

        // Export functionality
        // Get all district data
        function getDistrictData() {
            const districtLinks = document.querySelectorAll('.district-link');
            const districts = [];

            if (districtLinks.length === 0) {
                console.warn('No district links found for export');
                return districts;
            }

            districtLinks.forEach(link => {
                const districtId = link.getAttribute('data-district-id');
                const districtName = link.getAttribute('data-district-name');
                const kindergartensCountElement = link.querySelector('span');
                const kindergartensCount = kindergartensCountElement ? kindergartensCountElement.textContent.replace(' kindergarten', '').trim() : '0';

                districts.push({
                    'ID': districtId,
                    'Tuman nomi': districtName,
                    'Kindergartenlar soni': kindergartensCount
                });
            });

            return districts;
        }

        // Export to Excel
        document.getElementById('exportExcel').addEventListener('click', () => {
            const districts = getDistrictData();

            if (districts.length === 0) {
                alert('Eksport qilish uchun ma\'lumotlar mavjud emas.');
                return;
            }

            try {
                const worksheet = XLSX.utils.json_to_sheet(districts);
                const workbook = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(workbook, worksheet, "Tumanlar");

                // Generate Excel file
                XLSX.writeFile(workbook, "tumanlar_royxati.xlsx");
                console.log('Excel export completed successfully');
            } catch (error) {
                console.error('Excel export error:', error);
                alert('Excel formatida eksport qilishda xatolik yuz berdi.');
            }
        });

        // Export to CSV
        document.getElementById('exportCSV').addEventListener('click', () => {
            const districts = getDistrictData();

            if (districts.length === 0) {
                alert('Eksport qilish uchun ma\'lumotlar mavjud emas.');
                return;
            }

            try {
                const worksheet = XLSX.utils.json_to_sheet(districts);
                const csv = XLSX.utils.sheet_to_csv(worksheet);

                // Create blob and save
                const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
                saveAs(blob, "tumanlar_royxati.csv");
                console.log('CSV export completed successfully');
            } catch (error) {
                console.error('CSV export error:', error);
                alert('CSV formatida eksport qilishda xatolik yuz berdi.');
            }
        });

        // Export to PDF
        document.getElementById('exportPDF').addEventListener('click', () => {
            const districts = getDistrictData();

            if (districts.length === 0) {
                alert('Eksport qilish uchun ma\'lumotlar mavjud emas.');
                return;
            }

            try {
                // Create a hidden form to submit for server-side PDF generation
                const form = document.createElement('form');
                form.method = 'POST';

                // Check if the route exists, otherwise use a fallback
                @if(Route::has('districts.export.pdf'))
                    form.action = '{{ route("districts.export.pdf") }}';
                @else
                    form.action = '/districts/export/pdf';
                alert('Ogohlantirish: PDF eksport manzili mavjud emas.');
                @endif

                // Add CSRF token
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                // Add districts data as JSON
                const districtsData = document.createElement('input');
                districtsData.type = 'hidden';
                districtsData.name = 'districts_data';
                districtsData.value = JSON.stringify(districts);
                form.appendChild(districtsData);

                // Submit the form
                document.body.appendChild(form);
                form.submit();
                console.log('PDF export request submitted');
            } catch (error) {
                console.error('PDF export error:', error);
                alert('PDF formatida eksport qilishda xatolik yuz berdi.');
            }
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
