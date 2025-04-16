@props(['school'])

<div>
    <h3 class="text-xl font-semibold text-gray-900 mb-4">Lokatsiya va Rasmlar</h3>
    
    <p class="text-gray-600 mb-2">
        <strong>Lokatsiya:</strong>
        @isset($school->lokatsiya)
            <a href="{{ $school->lokatsiya }}" target="_blank" class="location-link text-gray-600 hover:underline">
                Xaritada ko'rish
            </a>
        @else
            <span>Ma'lumot mavjud emas</span>
        @endisset
    </p>
    
    <div class="mt-4">
        <label class="block text-gray-700 font-semibold mb-2">Maktab Rasmlari:</label>
        <div class="image-grid">
            @if(isset($school->maktab_rasmlari) && $school->maktab_rasmlari)
                @foreach(json_decode($school->maktab_rasmlari) as $image)
                    <img class="preview-img w-full h-32 object-cover" src="{{ asset('storage/'.$image) }}" alt="Maktab Rasmi">
                @endforeach
            @else
                <p class="text-gray-500">Rasmlar mavjud emas</p>
            @endif
        </div>
    </div>
</div>

<style>
    .preview-img {
        border-radius: 8px;
        transition: transform 0.3s ease;
    }
    .preview-img:hover {
        transform: scale(1.05);
    }
    .image-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1rem;
        max-height: 400px;
        overflow-y: auto;
        padding: 1rem;
        background-color: #f9fafb;
        border-radius: 8px;
    }
    .location-link:hover {
        color: #2563eb;
        text-decoration: underline;
    }
</style>

