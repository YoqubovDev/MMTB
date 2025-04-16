@props(['school'])

<div>
    <h3 class="text-xl font-semibold text-gray-900 mb-4">Energiya Iste'moli</h3>
    
    @isset($school->gaz_istemoli)
        <p class="text-gray-600 mb-2"><strong>1 yillik o'rtacha gaz iste'moli:</strong> {{ $school->gaz_istemoli }} m³</p>
    @else
        <p class="text-gray-600 mb-2"><strong>1 yillik o'rtacha gaz iste'moli:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($school->elektr_istemoli)
        <p class="text-gray-600 mb-2"><strong>1 yillik o'rtacha elektr iste'moli:</strong> {{ $school->elektr_istemoli }} kWh</p>
    @else
        <p class="text-gray-600 mb-2"><strong>1 yillik o'rtacha elektr iste'moli:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($school->issiqlik_istemoli)
        <p class="text-gray-600 mb-2"><strong>1 yillik o'rtacha issiqlik iste'moli:</strong> {{ $school->issiqlik_istemoli }} Gcal</p>
    @else
        <p class="text-gray-600 mb-2"><strong>1 yillik o'rtacha issiqlik iste'moli:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    <p class="text-gray-600 mb-2"><strong>Quyosh paneli:</strong> {{ isset($school->quyosh_paneli) && $school->quyosh_paneli ? 'Mavjud' : 'Mavjud emas' }}</p>
    
    <p class="text-gray-600 mb-2"><strong>Geokollektor:</strong> {{ isset($school->geokollektor) && $school->geokollektor ? 'Mavjud' : 'Mavjud emas' }}</p>
</div>

