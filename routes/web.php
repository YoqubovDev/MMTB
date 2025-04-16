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
Route::get('/kindergarten-region', [DistrictController::class, 'kindergartenRegion'])->name('kindergarten-region');
Route::get('/data/{id}', [HomeController::class, 'data'])->name('data');
Route::middleware(['auth'])->group(function () {
    Route::get('/main', [HomeController::class, 'main'])->name('main');
    // Added resource routes with custom index route
    Route::resource('added', \App\Http\Controllers\AddedController::class)->except(['index']);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/added', [HomeController::class, 'added'])->name('added');


require __DIR__.'/auth.php';
