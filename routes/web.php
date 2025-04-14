<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'welcome'] )->name('welcome');
Route::get('/main', [HomeController::class, 'main'] )->middleware('auth')->name('main');

Route::get('/school-region',[HomeController::class, 'schoolRegion'])->name('school-region');
Route::get('/kindergarten-region',[HomeController::class, 'kindergartenRegion'])->name('kindergarten-region');

Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
