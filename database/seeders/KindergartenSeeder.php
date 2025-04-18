<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kindergarten;

class KindergartenSeeder extends Seeder
{
    public function run(): void
    {
        Kindergarten::factory()->count(20)->create();
    }
}
