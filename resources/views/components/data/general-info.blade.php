
@props(['added', 'school'])

<div>
    <h3 class="text-xl font-semibold text-gray-900 mb-4">Umumiy Ma'lumotlar</h3>
    
    @isset($added->mfy)
        <p class="text-gray-600 mb-2"><strong>Manzil (MFY):</strong> {{ $added->mfy }}</p>
    @endisset
    
    @isset($school->qurilgan_yili)
        <p class="text-gray-600 mb-2"><strong>Qurilgan yili:</strong> {{ $school->qurilgan_yili }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Qurilgan yili:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($school->songi_tamir_yili)
        <p class="text-gray-600 mb-2"><strong>So'ngi tamirlangan yili:</strong> {{ $school->songi_tamir_yili }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>So'ngi tamirlangan yili:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($school->sektor_raqami)
        <p class="text-gray-600 mb-2"><strong>Sektor raqami:</strong> {{ $school->sektor_raqami }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Sektor raqami:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($school->yer_maydoni)
        <p class="text-gray-600 mb-2"><strong>Yer maydoni:</strong> {{ $school->yer_maydoni }} m²</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Yer maydoni:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    <p class="text-gray-600 mb-2"><strong>Xudud o'ralganligi:</strong> {{ isset($school->xudud_oralganligi) && $school->xudud_oralganligi ? 'Ha' : 'Yo\'q' }}</p>
    
    @isset($school->binolar_soni)
        <p class="text-gray-600 mb-2"><strong>Binolar soni:</strong> {{ $school->binolar_soni }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Binolar soni:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($school->binolar_qavatligi)
        <p class="text-gray-600 mb-2"><strong>Binolar qavatligi:</strong> {{ $school->binolar_qavatligi }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Binolar qavatligi:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($school->binolar_maydoni)
        <p class="text-gray-600 mb-2"><strong>Binolar maydoni:</strong> {{ $school->binolar_maydoni }} m²</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Binolar maydoni:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($school->istilidigan_maydon)
        <p class="text-gray-600 mb-2"><strong>Istilidigan maydon:</strong> {{ $school->istilidigan_maydon }} m²</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Istilidigan maydon:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($school->quvvati)
        <p class="text-gray-600 mb-2"><strong>Quvvati:</strong> {{ $school->quvvati }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Quvvati:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($school->oquvchi_soni)
        <p class="text-gray-600 mb-2"><strong>O'quvchi soni:</strong> {{ $school->oquvchi_soni }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>O'quvchi soni:</strong> Ma'lumot mavjud emas</p>
    @endisset
    
    @isset($school->koffsiyent)
        <p class="text-gray-600 mb-2"><strong>Koffsiyent:</strong> {{ $school->koffsiyent }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Koffsiyent:</strong> Ma'lumot mavjud emas</p>
    @endisset
</div>
