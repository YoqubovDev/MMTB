<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Kindergarten;
use Illuminate\Database\Seeder;

class KindergartenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = District::all();

        // Sample kindergarten data for each district
        foreach ($districts as $district) {
            // Create 2-3 kindergartens per district
            $kindergartenCount = rand(2, 3);
            
            for ($i = 1; $i <= $kindergartenCount; $i++) {
                $kindergartenNumber = rand(1, 299);
                
                Kindergarten::create([
                    'name' => "{$district->name} {$kindergartenNumber}-bog'cha",
                    'address' => "{$district->name}, {$this->getRandomStreet()} ko'chasi, {$this->getRandomBuildingNumber()}-uy",
                    'district_id' => $district->id,
                    'contact_number' => $this->generatePhoneNumber(),
                    'email' => strtolower(str_replace(' ', '', "bogcha{$kindergartenNumber}_{$district->name}@mtv.uz")),
                    'director_name' => $this->getRandomDirectorName(),
                    'capacity' => $this->getRandomCapacity(),
                    'age_range' => $this->getRandomAgeRange(),
                    'status' => true,
                ]);
            }

            // Add one specialized kindergarten per district
            $specializedTypes = [
                'Ingliz tili',
                'Musiqa va san\'at',
                'Sport',
                'Innovatsion',
                'Montessori',
                'Intellektual rivojlanish'
            ];
            
            $specializedType = $specializedTypes[array_rand($specializedTypes)];
            $specializedKindergartenNumber = rand(300, 350);
            
            Kindergarten::create([
                'name' => "{$district->name} \"{$specializedType}\" maxsus bog'chasi",
                'address' => "{$district->name}, {$this->getRandomStreet()} ko'chasi, {$this->getRandomBuildingNumber()}-uy",
                'district_id' => $district->id,
                'contact_number' => $this->generatePhoneNumber(),
                'email' => strtolower(str_replace(' ', '', "{$specializedType}_{$district->name}@mtv.uz")),
                'director_name' => $this->getRandomDirectorName(),
                'capacity' => $this->getRandomCapacity(150, 250),
                'age_range' => $this->getRandomAgeRange(true),
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
     * Get a random Uzbek director name.
     */
    private function getRandomDirectorName(): string
    {
        $firstNames = [
            'Aziza', 'Nodira', 'Malika', 'Dilnoza', 'Sabina', 'Nargiza', 'Gulnora', 'Manzura', 
            'Zumrad', 'Feruza', 'Nigora', 'Dilfuza', 'Shakhnoza', 'Barno', 'Lola',
            'Jahongir', 'Rustam', 'Ravshan', 'Akbar', 'Alisher', 'Dilshod', 'Botir'
        ];
        
        $lastNames = [
            'Ahmedova', 'Karimova', 'Rahimova', 'Nuriddinova', 'Saidova',
            'Toshmatova', 'Qodirova', 'Yusupova', 'Umarova', 'Nizomova',
            'Ahmedov', 'Karimov', 'Rahimov', 'Nuriddinov', 'Saidov'
        ];
        
        $firstName = $firstNames[array_rand($firstNames)];
        $lastName = $lastNames[array_rand($lastNames)];
        
        // Match gender of first name and last name
        if (in_array($firstName, ['Jahongir', 'Rustam', 'Ravshan', 'Akbar', 'Alisher', 'Dilshod', 'Botir'])) {
            $lastName = str_replace('ova', 'ov', $lastName);
        }
        
        return $firstName . ' ' . $lastName;
    }

    /**
     * Get a random capacity for a kindergarten.
     */
    private function getRandomCapacity(int $min = 60, int $max = 180): int
    {
        // Round to nearest 10
        $capacity = rand($min / 10, $max / 10) * 10;
        return $capacity;
    }

    /**
     * Get a random age range for a kindergarten.
     */
    private function getRandomAgeRange(bool $specialized = false): string
    {
        $ageRanges = [
            '2-7 yosh',
            '3-6 yosh',
            '3-7 yosh',
            '2-6 yosh',
            '1.5-7 yosh',
        ];
        
        if ($specialized) {
            // Specialized kindergartens might have different age ranges
            $specializedRanges = [
                '3-7 yosh',
                '4-7 yosh',
                '3-6 yosh',
                '2-7 yosh',
            ];
            return $specializedRanges[array_rand($specializedRanges)];
        }
        
        return $ageRanges[array_rand($ageRanges)];
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

