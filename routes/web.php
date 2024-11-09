<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NumeroController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/venta-online/{id}', [HomeController::class, 'ventaonline'])->name('home.venta-online');

Route::resource('clientes', ClienteController::class);
Route::resource('numeros', NumeroController::class);
Route::resource('ventas', VentaController::class);
Route::post('/ventas/storeonline', [VentaController::class, 'storeonline'])->name('ventas.storeonline');
Route::resource('responsables', ResponsableController::class);
Route::resource('eventos', EventoController::class);
