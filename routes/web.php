<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('finances/overview', [\App\Http\Controllers\FinancesController::class, 'index'])
    ->middleware(['auth'])
    ->name('finances.overview');

Route::resource('finances/collections', \App\Http\Controllers\CollectionController::class)
    ->middleware(['auth']);

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
