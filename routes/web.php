<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

//Route::view('dashboard', 'dashboard')
//    ->middleware(['auth', 'verified'])
//    ->name('dashboard');

Route::redirect('dashboard', 'finances/overview')->name('dashboard');

Route::get('finances', [\App\Http\Controllers\FinancesController::class, 'index'])
    ->middleware(['auth'])
    ->name('finances');

Route::get('finances/overview', [\App\Http\Controllers\FinancesController::class, 'index'])
    ->middleware(['auth'])
    ->name('finances.overview');

Route::resource('finances/collections', \App\Http\Controllers\CollectionController::class)
    ->middleware(['auth'])
    ->name('show', 'finances.collections.show')
    ->name('index', 'finances.collections.index');

Route::redirect('detentes', 'detentes/overview')->name('detentes');

Route::get('mandates/overview', [\App\Http\Controllers\MandatesController::class, 'index'])
    ->middleware(['auth'])
    ->name('mandates.overview');

Route::resource('contacts', \App\Http\Controllers\ContactController::class)
    ->middleware(['auth'])
    ->name('show', 'contacts.show');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource('projects', \App\Http\Controllers\ProjectController::class)
    ->middleware(['auth'])
    ->name('index', 'projects.index');

require __DIR__.'/auth.php';
