<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('/main', [HomeController::class, 'main'])->name('main');
    Route::get('/school-region', [HomeController::class, 'schoolRegion'])->name('school-region');
    Route::get('/kindergarten-region', [HomeController::class, 'kindergartenRegion'])->name('kindergarten-region');
    Route::get('/added', [HomeController::class, 'added'])->name('added');
    Route::get('/data', [HomeController::class, 'data'])->name('data');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
