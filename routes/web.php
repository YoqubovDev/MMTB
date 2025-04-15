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

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';

// District routes
Route::middleware(['auth'])->group(function () {
    Route::get('/districts', [App\Http\Controllers\DistrictController::class, 'index'])->name('districts.index');
    Route::get('/districts/{district}', [App\Http\Controllers\DistrictController::class, 'show'])->name('districts.show');
    
    // School routes
    Route::resource('schools', App\Http\Controllers\SchoolController::class);
    
    // Kindergarten routes
    Route::resource('kindergartens', App\Http\Controllers\KindergartenController::class);
});
