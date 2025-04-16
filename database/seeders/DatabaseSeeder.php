<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seederlar shu yerda ketma-ketlikda ishlaydi
        $this->call([
            DistrictSeeder::class,
            SchoolSeeder::class,
            KindergartenSeeder::class,
        ]);

        // Agar xohlasangiz, boshqa seederlar yoki factory'lar ham shu yerga qo‘shilishi mumkin
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
