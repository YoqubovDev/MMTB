<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Kindergarten extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'kindergartens';
    protected $fillable = [
        'district_id',
        'mfy',
        'qurilgan_yili',
        'songi_tamir_yili',
        'sektor_raqami',
        'yer_maydoni',
        'xudud_oralganligi',
        'binolar_soni',
        'binolar_qavatligi',
        'binolar_maydoni',
        'istilidigan_maydon',
        'quvvati',
        'bolalar_soni',
        'koffsiyent',
        'oshxona_yoki_bufet_quvvati',
        'sport_zal_soni_va_maydoni',
        'faollar_zali_va_quvvati',
        'xolati',
        'tom_xolati_yuzda',
        'deraza_rom_xolati_yuzda',
        'istish_turi',
        'qozonlar_soni',
        'qozonlar_xolati_yuzda',
        'apoklar_xolati_yuzda',
        'gaz_istemoli',
        'elektr_istemoli',
        'issiqlik_istemoli',
        'quyosh_paneli',
        'geokollektor',
        'lokatsiya',
        'boqcha_rasmlari'
    ];

    /**
     * Get the district that owns the kindergarten.
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Get validation rules for the kindergarten.
     */
    public static function validationRules(): array
    {
        return [
            'district_id' => 'required|exists:districts,id',
            'mfy' => 'required|string|max:255',
            'qurilgan_yili' => 'required|integer|min:1800|max:' . date('Y'),
            'songi_tamir_yili' => 'nullable|integer|min:1800|max:' . date('Y'),
            'sektor_raqami' => 'nullable|integer',
            'yer_maydoni' => 'nullable|numeric',
            'xudud_oralganligi' => 'nullable|boolean',
            'binolar_soni' => 'nullable|integer|min:0',
            'binolar_qavatligi' => 'nullable|integer|min:0',
            'binolar_maydoni' => 'nullable|numeric',
            'istilidigan_maydon' => 'nullable|numeric',
            'quvvati' => 'nullable|integer|min:0',
            'bolalar_soni' => 'nullable|integer|min:0',
            'koffsiyent' => 'nullable|numeric',
            'oshxona_yoki_bufet_quvvati' => 'nullable|string|max:255',
            'sport_zal_soni_va_maydoni' => 'nullable|string|max:255',
            'faollar_zali_va_quvvati' => 'nullable|string|max:255',
            'xolati' => 'nullable|string|max:255',
            'tom_xolati_yuzda' => 'nullable|numeric|min:0|max:100',
            'deraza_rom_xolati_yuzda' => 'nullable|numeric|min:0|max:100',
            'istish_turi' => 'nullable|string|max:255',
            'qozonlar_soni' => 'nullable|integer|min:0',
            'qozonlar_xolati_yuzda' => 'nullable|numeric|min:0|max:100',
            'apoklar_xolati_yuzda' => 'nullable|numeric|min:0|max:100',
            'gaz_istemoli' => 'nullable|numeric',
            'elektr_istemoli' => 'nullable|numeric',
            'issiqlik_istemoli' => 'nullable|numeric',
            'quyosh_paneli' => 'nullable|boolean',
            'geokollektor' => 'nullable|boolean',
            'lokatsiya' => 'nullable|string|max:255',
            'boqcha_rasmlari' => 'nullable|file|image|max:10240|mimes:jpeg,png,jpg,gif',  // 10MB max
        ];
    }

    public static function validationMessages(): array
    {
        return [
            'district_id.required' => 'Tuman tanlanishi shart',
            'mfy.required' => 'MFY maydoni to\'ldirilishi shart',
            'qurilgan_yili.required' => 'Qurilgan yili to\'ldirilishi shart',
            'qurilgan_yili.integer' => 'Qurilgan yili butun son bo\'lishi kerak',
            'qurilgan_yili.min' => 'Qurilgan yili :min dan kichik bo\'lmasligi kerak',
            'qurilgan_yili.max' => 'Qurilgan yili :max dan katta bo\'lmasligi kerak',
            'district_id.exists' => 'Tanlangan tuman mavjud emas',
            'bolalar_soni.integer' => 'Bolalar soni butun son bo\'lishi kerak',
            'bolalar_soni.min' => 'Bolalar soni 0 dan kichik bo\'lmasligi kerak',
            'boqcha_rasmlari.file' => 'Yuklangan fayl haqiqiy fayl bo\'lishi kerak',
            'boqcha_rasmlari.image' => 'Yuklangan fayl rasm formatida bo\'lishi kerak',
            'boqcha_rasmlari.max' => 'Rasm hajmi 10MB dan oshmasligi kerak',
            'boqcha_rasmlari.mimes' => 'Rasm formati: jpeg, png, jpg yoki gif bo\'lishi kerak',
        ];
    }

    public function kindergartenRegion()
    {
        $districts = DB::table('districts')
            ->leftJoin('kindergartens', 'districts.id', '=', 'kindergartens.district_id')
            ->select('districts.*')
            ->groupBy('districts.id')
            ->get();

        $debugMessage = 'Kindergarten region data loaded successfully';
        $executionTime = round(microtime(true) * 1000) - LARAVEL_START;

        return view('districts.kindergartens', compact('districts', 'debugMessage', 'executionTime'));
    }
}
