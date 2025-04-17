<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            DistrictSeeder::class, // Agar alohida DistrictSeeder bo‘lsa
            KindergartenSeeder::class,
            SchoolSeeder::class,
        ]);
    }
}
