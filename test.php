<?php
require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\District;
$districts = District::where('status', true)->get();
foreach ($districts as $district) {
    echo $district->name . "\n";
}

echo "\nTotal districts: " . count($districts) . "\n";

