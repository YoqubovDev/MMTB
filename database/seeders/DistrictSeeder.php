<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Added;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing districts data if needed
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('districts')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

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





            // Example of an inactive district
            [
                'name' => 'Test District (Inactive)',
                'region' => 'Tashkent',
                'status' => false,
            ],
        ];

        try {
            // Track seeding progress
            $this->command->info('Starting district seeding...');
            $districtCount = 0;
            $schoolCount = 0;

            foreach ($districts as $districtData) {
                $district = District::create($districtData);
                $districtCount++;

                // For active districts, create sample schools
                if ($district->status) {
                    $schoolsPerDistrict = rand(3, 8); // Create between 3-8 schools per district

                    for ($i = 1; $i <= $schoolsPerDistrict; $i++) {
                        Added::create([
                            'district_id' => $district->id,
                            'mfy' => "School #{$i} - {$district->name}",
                            'lokatsiya' => "{$district->name} District, Street {$i}",
                            'quvvati' => rand(300, 1200),
                            'xolati' => rand(0, 10) > 2 ? 'active' : 'inactive',
                            'oquvchi_soni' => rand(200, 1000),
                            'qurilgan_yili' => rand(1950, 2020),
                            'songi_tamir_yili' => rand(2010, 2025),
                            'maktab_raqami' => rand(1, 9),
                            'yer_maydoni' => rand(5000, 15000) / 100,
                            'xudud_oralganligi' => rand(0, 1),
                            'binolar_soni' => rand(1, 5),
                            'binolar_qavatligi' => rand(1, 4)
                        ]);
                        $schoolCount++;
                    }
                }

                // Log progress for larger datasets
                if ($districtCount % 10 === 0) {
                    $this->command->info("Seeded {$districtCount} districts so far...");
                }
            }

            $this->command->info("Seeding completed successfully:");
            $this->command->info("- {$districtCount} districts created");
            $this->command->info("- {$schoolCount} sample schools created");

        } catch (\Exception $e) {
            $this->command->error("Error seeding districts: " . $e->getMessage());
        }
    }
}
