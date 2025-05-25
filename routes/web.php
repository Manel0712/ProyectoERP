<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientController;
use App\Http\Controllers\producteServeiController;
use App\Http\Controllers\UsuariController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DetalleVentaController;

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

Route::get('/productes/proveidor', [producteServeiController::class, "productesProveidor"]);

Route::resource('/productesServeis', producteServeiController::class);

Route::resource('/administracio', UsuariController::class);

Route::resource('/ventas', VentaController::class);

Route::get('/DetalleVenta/{venta}', [DetalleVentaController::class, "index"]);

Route::get('/DetalleVenta/create/{detalleventa}', [DetalleVentaController::class, "create"]);

Route::post('/añadirDetalleVenta/{detalleventa}', [DetalleVentaController::class, "store"]);

Route::resource('/DetalleVentas', DetalleVentaController::class);

require __DIR__.'/auth.php';
