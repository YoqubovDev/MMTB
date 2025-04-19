<?php

namespace Database\Factories;

use App\Models\Kindergarten;
use Illuminate\Database\Eloquent\Factories\Factory;

class KindergartenFactory extends Factory
{
    protected $model = Kindergarten::class;

    public function definition(): array
    {
        return [
            'mfy' => $this->faker->streetName(),
            'qurilgan_yili' => $this->faker->year(),
            'songi_tamir_yili' => $this->faker->optional()->year(),
            'sektor_raqami' => $this->faker->numberBetween(1, 4),
            'yer_maydoni' => $this->faker->randomFloat(2, 500, 5000),
            'xudud_oralganligi' => $this->faker->boolean(),
            'binolar_soni' => $this->faker->numberBetween(1, 5),
            'binolar_qavatligi' => $this->faker->numberBetween(1, 3),
            'binolar_maydoni' => $this->faker->randomFloat(2, 300, 3000),
            'istilidigan_maydon' => $this->faker->randomFloat(2, 200, 2000),
            'quvvati' => $this->faker->numberBetween(50, 300),
            'bolalar_soni' => $this->faker->numberBetween(20, 300),
            'koffsiyent' => $this->faker->randomFloat(2, 0.5, 2),
            'oshxona_yoki_bufet_quvvati' => $this->faker->randomElement(['oshxona', 'bufet']),
            'sport_zal_soni_va_maydoni' => '1 ta / 150 m²',
            'faollar_zali_va_quvvati' => '1 ta / 100 kishilik',
            'xolati' => $this->faker->randomElement(['Yaxshi', 'Qoniqarli', 'Yomon']),
            'tom_xolati_yuzda' => $this->faker->numberBetween(50, 100),
            'deraza_rom_xolati_yuzda' => $this->faker->numberBetween(50, 100),
            'istish_turi' => $this->faker->randomElement(['Markaziy', 'Qozonxona', 'Elektr']),
            'qozonlar_soni' => $this->faker->numberBetween(1, 3),
            'qozonlar_xolati_yuzda' => $this->faker->numberBetween(60, 100),
            'apoklar_xolati_yuzda' => $this->faker->numberBetween(60, 100),
            'gaz_istemoli' => $this->faker->randomFloat(2, 100, 1000),
            'elektr_istemoli' => $this->faker->randomFloat(2, 100, 1000),
            'issiqlik_istemoli' => $this->faker->randomFloat(2, 100, 1000),
            'quyosh_paneli' => $this->faker->boolean(),
            'geokollektor' => $this->faker->boolean(),
            'lokatsiya' => $this->faker->address(),
            'boqcha_rasmlari' => null,
        ];
    }
}
