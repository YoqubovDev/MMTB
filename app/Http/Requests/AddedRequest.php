<?php

namespace App\Http\Requests;

use App\Models\Added;
use Illuminate\Foundation\Http\FormRequest;

class AddedRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // Authorization will be handled by the policy
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $rules = Added::validationRules();
        
        // Add district_id validation
        $rules['district_id'] = 'nullable|exists:districts,id';
        
        // Ensure file validation is properly set
        $rules['maktab_rasmlari'] = 'nullable|file|image|max:10240|mimes:jpeg,png,jpg,gif';
        
        return $rules;
    }

    /**
     * Get custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            // District validation
            'district_id.exists' => 'Tanlangan tuman mavjud emas',
            
            // General field validations
            'mfy.required' => 'MFY maydoni to\'ldirilishi shart',
            'mfy.string' => 'MFY matn formatida bo\'lishi kerak',
            'mfy.max' => 'MFY 255 ta belgidan oshmasligi kerak',
            
            // Year validations
            'qurilgan_yili.required' => 'Qurilgan yili to\'ldirilishi shart',
            'qurilgan_yili.integer' => 'Qurilgan yili butun son bo\'lishi kerak',
            'qurilgan_yili.min' => 'Qurilgan yili :min yildan oldingi bo\'lmasligi kerak',
            'qurilgan_yili.max' => 'Qurilgan yili hozirgi yildan keyingi bo\'lmasligi kerak',
            
            'songi_tamir_yili.integer' => 'So\'ngi ta\'mirlangan yili butun son bo\'lishi kerak',
            'songi_tamir_yili.min' => 'So\'ngi ta\'mirlangan yili :min yildan oldingi bo\'lmasligi kerak',
            'songi_tamir_yili.max' => 'So\'ngi ta\'mirlangan yili hozirgi yildan keyingi bo\'lmasligi kerak',
            
            // Numeric field validations
            'sektor_raqami.integer' => 'Sektor raqami butun son bo\'lishi kerak',
            'yer_maydoni.numeric' => 'Yer maydoni son bo\'lishi kerak',
            'binolar_soni.integer' => 'Binolar soni butun son bo\'lishi kerak',
            'binolar_soni.min' => 'Binolar soni manfiy bo\'lmasligi kerak',
            'binolar_qavatligi.integer' => 'Binolar qavatligi butun son bo\'lishi kerak',
            'binolar_qavatligi.min' => 'Binolar qavatligi manfiy bo\'lmasligi kerak',
            'binolar_maydoni.numeric' => 'Binolar maydoni son bo\'lishi kerak',
            'istilidigan_maydon.numeric' => 'Istilidigan maydon son bo\'lishi kerak',
            'quvvati.integer' => 'Quvvati butun son bo\'lishi kerak',
            'quvvati.min' => 'Quvvati manfiy bo\'lmasligi kerak',
            'oquvchi_soni.integer' => 'O\'quvchi soni butun son bo\'lishi kerak',
            'oquvchi_soni.min' => 'O\'quvchi soni manfiy bo\'lmasligi kerak',
            'koffsiyent.numeric' => 'Koeffitsiyent son bo\'lishi kerak',
            
            // Percentage validations
            'tom_xolati_yuzda.numeric' => 'Tom holati foizi son bo\'lishi kerak',
            'tom_xolati_yuzda.min' => 'Tom holati foizi 0 dan kam bo\'lmasligi kerak',
            'tom_xolati_yuzda.max' => 'Tom holati foizi 100 dan ko\'p bo\'lmasligi kerak',
            
            'deraza_rom_xolati_yuzda.numeric' => 'Deraza ram holati foizi son bo\'lishi kerak',
            'deraza_rom_xolati_yuzda.min' => 'Deraza ram holati foizi 0 dan kam bo\'lmasligi kerak',
            'deraza_rom_xolati_yuzda.max' => 'Deraza ram holati foizi 100 dan ko\'p bo\'lmasligi kerak',
            
            'qozonlar_xolati_yuzda.numeric' => 'Qozonlar holati foizi son bo\'lishi kerak',
            'qozonlar_xolati_yuzda.min' => 'Qozonlar holati foizi 0 dan kam bo\'lmasligi kerak',
            'qozonlar_xolati_yuzda.max' => 'Qozonlar holati foizi 100 dan ko\'p bo\'lmasligi kerak',
            
            'apoklar_xolati_yuzda.numeric' => 'Apoklar holati foizi son bo\'lishi kerak',
            'apoklar_xolati_yuzda.min' => 'Apoklar holati foizi 0 dan kam bo\'lmasligi kerak',
            'apoklar_xolati_yuzda.max' => 'Apoklar holati foizi 100 dan ko\'p bo\'lmasligi kerak',
            
            // Boolean field validations
            'xudud_oralganligi.boolean' => 'Hudud o\'ralganligi qiymati to\'g\'ri formatda emas',
            'quyosh_paneli.boolean' => 'Quyosh paneli qiymati to\'g\'ri formatda emas',
            'geokollektor.boolean' => 'Geokollektor qiymati to\'g\'ri formatda emas',
            
            // File validations
            'maktab_rasmlari.file' => 'Yuklangan fayl haqiqiy fayl bo\'lishi kerak',
            'maktab_rasmlari.image' => 'Yuklangan fayl rasm formatida bo\'lishi kerak',
            'maktab_rasmlari.max' => 'Rasm hajmi 10 MB dan oshmasligi kerak',
            'maktab_rasmlari.mimes' => 'Rasm formati: JPEG, PNG, JPG yoki GIF bo\'lishi kerak',
        ];
    }
}
