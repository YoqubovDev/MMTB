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
            // Tashkent City districts
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
            
            // Samarkand region districts
            [
                'name' => 'Samarkand City',
                'region' => 'Samarkand',
                'status' => true,
            ],
            [
                'name' => 'Bulungur',
                'region' => 'Samarkand',
                'status' => true,
            ],
            [
                'name' => 'Ishtixon',
                'region' => 'Samarkand',
                'status' => true,
            ],
            [
                'name' => 'Jomboy',
                'region' => 'Samarkand',
                'status' => true,
            ],
            
            // Bukhara region districts
            [
                'name' => 'Bukhara City',
                'region' => 'Bukhara',
                'status' => true,
            ],
            [
                'name' => 'Gijduvan',
                'region' => 'Bukhara',
                'status' => true,
            ],
            [
                'name' => 'Karakul',
                'region' => 'Bukhara',
                'status' => true,
            ],
            
            // Andijan region districts
            [
                'name' => 'Andijan City',
                'region' => 'Andijan',
                'status' => true,
            ],
            [
                'name' => 'Asaka',
                'region' => 'Andijan',
                'status' => true,
            ],
            [
                'name' => 'Baliqchi',
                'region' => 'Andijan',
                'status' => true,
            ],
            
            // Fergana region districts
            [
                'name' => 'Fergana City',
                'region' => 'Fergana',
                'status' => true,
            ],
            [
                'name' => 'Kuva',
                'region' => 'Fergana',
                'status' => true,
            ],
            [
                'name' => 'Qo\'qon',
                'region' => 'Fergana',
                'status' => true,
            ],
            
            // Namangan region districts
            [
                'name' => 'Namangan City',
                'region' => 'Namangan',
                'status' => true,
            ],
            [
                'name' => 'Chust',
                'region' => 'Namangan',
                'status' => true,
            ],
            [
                'name' => 'Pop',
                'region' => 'Namangan',
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

