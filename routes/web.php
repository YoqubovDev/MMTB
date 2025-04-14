<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'] )->name('home');
Route::get('/main', [HomeController::class, 'main'] )->middleware('auth')->name('main');

Route::get('/region',[HomeController::class, 'schoolRegion'])->name('school-region');



require __DIR__.'/auth.php';
