@props(['added', 'kindergartenId'])

<div>
    <h3 class="text-xl font-semibold text-gray-900 mb-4">Umumiy Ma'lumotlar</h3>

    @isset($added->mfy)
        <p class="text-gray-600 mb-2"><strong>Manzil (MFY):</strong> {{ $added->mfy }}</p>
    @endisset

    @isset($kindergartenId->qurilgan_yili)
        <p class="text-gray-600 mb-2"><strong>Qurilgan yili:</strong> {{ $kindergartenId->qurilgan_yili }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Qurilgan yili:</strong> Ma'lumot mavjud emas</p>
    @endisset

    @isset($kindergartenId->songi_tamir_yili)
        <p class="text-gray-600 mb-2"><strong>So'ngi tamirlangan yili:</strong> {{ $kindergartenId->songi_tamir_yili }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>So'ngi tamirlangan yili:</strong> Ma'lumot mavjud emas</p>
    @endisset

    @isset($kindergartenId->boqcha_raqami)
        <p class="text-gray-600 mb-2"><strong>Bog'cha raqami:</strong> {{ $kindergartenId->boqcha_raqami }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Bog'cha raqami:</strong> Ma'lumot mavjud emas</p>
    @endisset

    @isset($kindergartenId->yer_maydoni)
        <p class="text-gray-600 mb-2"><strong>Yer maydoni:</strong> {{ $kindergartenId->yer_maydoni }} m²</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Yer maydoni:</strong> Ma'lumot mavjud emas</p>
    @endisset

    <p class="text-gray-600 mb-2"><strong>Xudud o'ralganligi:</strong> {{ isset($kindergartenId->xudud_oralganligi) && $kindergartenId->xudud_oralganligi ? 'Ha' : 'Yo\'q' }}</p>

    @isset($kindergartenId->binolar_soni)
        <p class="text-gray-600 mb-2"><strong>Binolar soni:</strong> {{ $kindergartenId->binolar_soni }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Binolar soni:</strong> Ma'lumot mavjud emas</p>
    @endisset

    @isset($kindergartenId->binolar_qavatligi)
        <p class="text-gray-600 mb-2"><strong>Binolar qavatligi:</strong> {{ $kindergartenId->binolar_qavatligi }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Binolar qavatligi:</strong> Ma'lumot mavjud emas</p>
    @endisset

    @isset($kindergartenId->binolar_maydoni)
        <p class="text-gray-600 mb-2"><strong>Binolar maydoni:</strong> {{ $kindergartenId->binolar_maydoni }} m²</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Binolar maydoni:</strong> Ma'lumot mavjud emas</p>
    @endisset

    @isset($kindergartenId->istilidigan_maydon)
        <p class="text-gray-600 mb-2"><strong>Istilidigan maydon:</strong> {{ $kindergartenId->istilidigan_maydon }} m²</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Istilidigan maydon:</strong> Ma'lumot mavjud emas</p>
    @endisset

    @isset($kindergartenId->quvvati)
        <p class="text-gray-600 mb-2"><strong>Quvvati:</strong> {{ $kindergartenId->quvvati }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Quvvati:</strong> Ma'lumot mavjud emas</p>
    @endisset

    @isset($kindergartenId->bolalar_soni)
        <p class="text-gray-600 mb-2"><strong>Bolalar soni:</strong> {{ $kindergartenId->bolalar_soni }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Bolalar soni:</strong> Ma'lumot mavjud emas</p>
    @endisset

    @isset($kindergartenId->koffsiyent)
        <p class="text-gray-600 mb-2"><strong>Koffsiyent:</strong> {{ $kindergartenId->koffsiyent }}</p>
    @else
        <p class="text-gray-600 mb-2"><strong>Koffsiyent:</strong> Ma'lumot mavjud emas</p>
    @endisset
</div>
