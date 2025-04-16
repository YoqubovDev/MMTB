<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistrictController;


Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/districts', [DistrictController::class, 'index'])->name('districts.index');
Route::get('/districts/{district}', [DistrictController::class, 'show'])->name('districts.show');

// Public routes
Route::get('/school-region', [DistrictController::class, 'schoolRegion'])->name('school-region');

Route::middleware(['auth'])->group(function () {
    Route::get('/main', [HomeController::class, 'main'])->name('main');
    Route::get('/kindergarten-region', [HomeController::class, 'kindergartenRegion'])->name('kindergarten-region');
    Route::get('/data', [HomeController::class, 'data'])->name('data');

    // Added resource routes with custom index route
    Route::get('/added', [HomeController::class, 'added'])->name('added');
    Route::resource('added', \App\Http\Controllers\AddedController::class)->except(['index']);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


require __DIR__.'/auth.php';
