@props(['school'])

<div>
    <h3 class="text-xl font-semibold text-gray-900 mb-4">Infratuzilma</h3>
    
    @isset($school->oshxona_yoki_bufet_quvvati)
        <p class="text-gray-600 mb-2"><strong>Oshxona yoki bufet quvvati:</strong> {{ $school->oshxona_yoki_bufet_quvvati }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Oshxona yoki bufet quvvati:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($school->sport_zal_soni_va_maydoni)
        <p class="text-gray-600 mb-2"><strong>Sport zal soni va maydoni:</strong> {{ $school->sport_zal_soni_va_maydoni }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Sport zal soni va maydoni:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($school->faollar_zali_va_quvvati)
        <p class="text-gray-600 mb-2"><strong>Faollar zali va quvvati:</strong> {{ $school->faollar_zali_va_quvvati }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Faollar zali va quvvati:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($school->xolati)
        <p class="text-gray-600 mb-2"><strong>Xolati:</strong> {{ $school->xolati }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Xolati:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($school->tom_xolati_yuzda)
        <p class="text-gray-600 mb-2"><strong>Tom xolati % da:</strong> {{ $school->tom_xolati_yuzda }}%</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Tom xolati % da:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($school->deraza_rom_xolati_yuzda)
        <p class="text-gray-600 mb-2"><strong>Deraza rom xolati % da:</strong> {{ $school->deraza_rom_xolati_yuzda }}%</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Deraza rom xolati % da:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($school->istish_turi)
        <p class="text-gray-600 mb-2"><strong>Istish turi:</strong> {{ $school->istish_turi }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Istish turi:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($school->qozonlar_soni)
        <p class="text-gray-600 mb-2"><strong>Qozonlar soni:</strong> {{ $school->qozonlar_soni }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Qozonlar soni:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($school->qozonlar_xolati_yuzda)
        <p class="text-gray-600 mb-2"><strong>Qozonlar xolati % da:</strong> {{ $school->qozonlar_xolati_yuzda }}%</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Qozonlar xolati % da:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($school->apoklar_xolati_yuzda)
        <p class="text-gray-600 mb-2"><strong>Apoklar xolati % da:</strong> {{ $school->apoklar_xolati_yuzda }}%</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Apoklar xolati % da:</strong> Ma'lumot mavjud emas</p>
    @endisset
</div>

