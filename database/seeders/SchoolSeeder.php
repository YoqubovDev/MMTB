<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Added;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = District::all();

        // Sample school data for each district
        foreach ($districts as $district) {
            // Create 2-3 schools per district
            $schoolCount = rand(2, 3);

            for ($i = 1; $i <= $schoolCount; $i++) {
                $schoolNumber = rand(1, 299);

                Added::create([
                    'name' => "{$district->name} {$schoolNumber}-maktab",
                    'address' => "{$district->name}, {$this->getRandomStreet()} ko'chasi, {$this->getRandomBuildingNumber()}-uy",
                    'district_id' => $district->id,
                    'contact_number' => $this->generatePhoneNumber(),
                    'email' => strtolower(str_replace(' ', '', "maktab{$schoolNumber}_{$district->name}@mtv.uz")),
                    'principal_name' => $this->getRandomPrincipalName(),
                    'capacity' => $this->getRandomCapacity(),
                    'status' => true,
                ]);
            }

            // Add one specialized school per district
            $specializedTypes = [
                'Matematika va fizika',
                'Chet tillari',
                'Iqtidorli bolalar',
                'San\'at',
                'Sport',
                'Informatika'
            ];

            $specializedType = $specializedTypes[array_rand($specializedTypes)];
            $specializedSchoolNumber = rand(300, 350);

            Added::create([
                'name' => "{$district->name} {$specializedType} ixtisoslashtirilgan maktabi",
                'address' => "{$district->name}, {$this->getRandomStreet()} ko'chasi, {$this->getRandomBuildingNumber()}-uy",
                'district_id' => $district->id,
                'contact_number' => $this->generatePhoneNumber(),
                'email' => strtolower(str_replace(' ', '', "{$specializedType}_{$district->name}@mtv.uz")),
                'principal_name' => $this->getRandomPrincipalName(),
                'capacity' => $this->getRandomCapacity(800, 1500),
                'status' => true,
            ]);
        }
    }

    /**
     * Generate a random Uzbekistan phone number.
     */
    private function generatePhoneNumber(): string
    {
        $prefixes = ['+99871', '+99872', '+99873', '+99874', '+99876', '+99877', '+99878'];
        $prefix = $prefixes[array_rand($prefixes)];

        return $prefix . ' ' . rand(100, 999) . ' ' . rand(10, 99) . ' ' . rand(10, 99);
    }

    /**
     * Get a random Uzbek principal name.
     */
    private function getRandomPrincipalName(): string
    {
        $firstNames = [
            'Jahongir', 'Rustam', 'Ravshan', 'Akbar', 'Alisher',
            'Dilshod', 'Botir', 'Ismoil', 'Murod', 'Sanjar',
            'Aziza', 'Nodira', 'Malika', 'Dilnoza', 'Sabina'
        ];

        $lastNames = [
            'Ahmedov', 'Karimov', 'Rahimov', 'Nuriddinov', 'Saidov',
            'Toshmatov', 'Qodirov', 'Yusupov', 'Umarov', 'Nizomov',
            'Ahmedova', 'Karimova', 'Rahimova', 'Nuriddinova', 'Saidova'
        ];

        $firstName = $firstNames[array_rand($firstNames)];
        $lastName = $lastNames[array_rand($lastNames)];

        // Match gender of first name and last name
        if (in_array($firstName, ['Aziza', 'Nodira', 'Malika', 'Dilnoza', 'Sabina'])) {
            $lastName = str_replace('ov', 'ova', $lastName);
        }

        return $firstName . ' ' . $lastName;
    }

    /**
     * Get a random capacity for a school.
     */
    private function getRandomCapacity(int $min = 300, int $max = 1200): int
    {
        // Round to nearest 100
        $capacity = rand($min / 100, $max / 100) * 100;
        return $capacity;
    }

    /**
     * Get a random street name.
     */
    private function getRandomStreet(): string
    {
        $streets = [
            'Mustaqillik', 'Amir Temur', 'Buyuk Ipak Yo\'li', 'Sharof Rashidov',
            'Bobur', 'Mirzo Ulug\'bek', 'Abdulla Qodiriy', 'Alisher Navoiy',
            'Bunyodkor', 'Furqat', 'Shota Rustaveli', 'Olmazor', 'Hamid Olimjon',
            'Shaxrisabz', 'O\'zbekiston', 'Beruniy', 'Istiqbol'
        ];

        return $streets[array_rand($streets)];
    }

    /**
     * Get a random building number.
     */
    private function getRandomBuildingNumber(): int
    {
        return rand(1, 150);
    }
}

