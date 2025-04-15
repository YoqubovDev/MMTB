<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = [
            [
                'name' => 'Bektemir',
                'region' => 'Tashkent',
                'status' => true,
            ],
            [
                'name' => 'Chilanzar',
                'region' => 'Tashkent',
                'status' => true,
            ],
            [
                'name' => 'Mirobod',
                'region' => 'Tashkent',
                'status' => true,
            ],
            [
                'name' => 'Mirzo Ulug\'bek',
                'region' => 'Tashkent',
                'status' => true,
            ],
            [
                'name' => 'Olmazor',
                'region' => 'Tashkent',
                'status' => true,
            ],
            [
                'name' => 'Sergeli',
                'region' => 'Tashkent',
                'status' => true,
            ],
            [
                'name' => 'Shayxontohur',
                'region' => 'Tashkent',
                'status' => true,
            ],
            [
                'name' => 'Uchtepa',
                'region' => 'Tashkent',
                'status' => true,
            ],
            [
                'name' => 'Yashnobod',
                'region' => 'Tashkent',
                'status' => true,
            ],
            [
                'name' => 'Yunusobod',
                'region' => 'Tashkent',
                'status' => true,
            ],
            [
                'name' => 'Yakkasaroy',
                'region' => 'Tashkent',
                'status' => true,
            ],
            [
                'name' => 'Yangihayot',
                'region' => 'Tashkent',
                'status' => true,
            ],
        ];

        foreach ($districts as $district) {
            District::updateOrCreate(
                ['name' => $district['name']],
                $district
            );
        }
    }
}

