<?php

use App\Http\Controllers\SchoolController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KindergartenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DistrictController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/districts', [DistrictController::class, 'index'])->name('districts.index');
Route::get('/districts/{district}', [DistrictController::class, 'show'])->name('districts.show');

// Public routes
Route::get('/school-region', [DistrictController::class, 'schoolRegion'])->name('school-region');
Route::get('/kindergarten-region', [DistrictController::class, 'kindergartenRegion'])->name('kindergarten-region');
Route::get('/school/data/{id}', [HomeController::class, 'school'])->name('school_data');
Route::get('/kinder/data/{id}', [HomeController::class, 'kinder'])->name('kinder_data');
Route::get('/kindergarten', [KindergartenController::class, 'kindergarten'])->name('kindergarten');
Route::get('/school', [SchoolController::class, 'school'])->name('added');

Route::middleware(['auth'])->group(function () {
    Route::get('/main', [HomeController::class, 'main'])->name('main');
    Route::resource('kindergarten', KindergartenController::class)->except('index', 'show');
    Route::resource('added', SchoolController::class);
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
});

require __DIR__.'/auth.php';
