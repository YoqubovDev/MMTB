<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Added extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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
        'oquvchi_soni',
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
        'lokatsiya'


    ];

    /**
     * Get the district that owns the school.
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Get validation rules for the school.
     */
    public static function validationRules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'district_id' => 'required|exists:districts,id',
            'contact_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'principal_name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|boolean',
        ];
    }
}

