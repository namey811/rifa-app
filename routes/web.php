<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NumeroController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/listar-numeros/{id}', [HomeController::class, 'listarnumeros'])->name('home.listar-numeros');
Route::get('/venta-online/{id}', [HomeController::class, 'ventaonline'])->name('home.venta-online');

Route::resource('clientes', ClienteController::class);
Route::resource('numeros', NumeroController::class);
Route::resource('pagos', PagoController::class);
Route::delete('pagos/{idp}/{idv}/{abono}/{saldo}', [PagoController::class, 'destroy'])->name('pagos.destroy');
Route::get('/cargarventasporcliente/{id}', [PagoController::class, 'cargarventasporcliente']);
Route::resource('ventas', VentaController::class);
Route::post('/ventas/storeonline', [VentaController::class, 'storeonline'])->name('ventas.storeonline');
Route::get('/cargarlistanumerosevento/{id}', [VentaController::class, 'cargarlistanumerosevento']);
Route::get('/ventas/consultanumeroscliente/{id}', [VentaController::class, 'consultanumeroscliente'])->name('consultaventaclient');
Route::get('/validate-cedula', [VentaController::class, 'validateCedula'])->name('validate.cedula');
Route::resource('responsables', ResponsableController::class);
Route::resource('eventos', EventoController::class);
