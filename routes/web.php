<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientController;
use App\Http\Controllers\producteServeiController;
use App\Http\Controllers\UsuariController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/dashboard', function() {
    return view("principal");
});

Route::resource('/clients', clientController::class);

Route::resource('/productesServeis', producteServeiController::class);

Route::resource('/administracio', UsuariController::class);

require __DIR__.'/auth.php';
