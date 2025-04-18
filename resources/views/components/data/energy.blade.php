@props(['kindergartenId'])

<div>
    <h3 class="text-xl font-semibold text-gray-900 mb-4">Energiya Iste'moli</h3>
    
    @isset($kindergartenId->gaz_istemoli)
        <p class="text-gray-600 mb-2"><strong>1 yillik o'rtacha gaz iste'moli:</strong> {{ $kindergartenId->gaz_istemoli }} m³</p>
    @else
        <p class="text-gray-600 mb-2"><strong>1 yillik o'rtacha gaz iste'moli:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($kindergartenId->elektr_istemoli)
        <p class="text-gray-600 mb-2"><strong>1 yillik o'rtacha elektr iste'moli:</strong> {{ $kindergartenId->elektr_istemoli }} kWh</p>
    @else
        <p class="text-gray-600 mb-2"><strong>1 yillik o'rtacha elektr iste'moli:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($kindergartenId->issiqlik_istemoli)
        <p class="text-gray-600 mb-2"><strong>1 yillik o'rtacha issiqlik iste'moli:</strong> {{ $kindergartenId->issiqlik_istemoli }} Gcal</p>
    @else
        <p class="text-gray-600 mb-2"><strong>1 yillik o'rtacha issiqlik iste'moli:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    <p class="text-gray-600 mb-2"><strong>Quyosh paneli:</strong> {{ isset($kindergartenId->quyosh_paneli) && $kindergartenId->quyosh_paneli ? 'Mavjud' : 'Mavjud emas' }}</p>
    
    <p class="text-gray-600 mb-2"><strong>Geokollektor:</strong> {{ isset($kindergartenId->geokollektor) && $kindergartenId->geokollektor ? 'Mavjud' : 'Mavjud emas' }}</p>
</div>
