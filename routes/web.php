<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\SocioController;
use App\Http\Controllers\DeudaController;
use App\Http\Controllers\userController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\DeudaPagoController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();
Route::get('user/profile/',[userController::class,'show2'])->name('user.show');
Route::patch('user/update/',[userController::class,'update2'])->name('user.update');
Route::resource('users',userController::class)->names('admin.users');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('socios',SocioController::class);
Route::get('socios-deudas/{socio}',[SocioController::class,'show_deudas'])->name('socios.deuda');
Route::get('socios-pagos/{socio}',[SocioController::class,'show_pagos'])->name('socios.pago');
Route::get('socios-pagos-store/{socio}',[PagoController::class,'store_socio'])->name('socios.pago.store');
Route::delete('socios-pagos-destroy/{pago}',[PagoController::class,'destroy_socio_pago'])->name('socios.pago.destroy');
Route::delete('socios-deudas-destroy/{deuda}',[DeudaController::class,'destroy_socio_deuda'])->name('socios.deuda.destroy');
Route::post('socios-deudas-store/{socio}',[DeudaController::class,'store_socio_deuda'])->name('socios.deuda.store');
Route::post('socios-buscar',[SocioController::class,'buscar'])->name('socios.buscar');


Route::resource('deudas',DeudaController::class);

Route::resource('pagos',PagoController::class);

Route::resource('deuda_pagos',DeudaPagoController::class);


Route::get('deuda-pagos-create/{socio}',[DeudaPagoController::class,'create_detalle'])->name('deuda.pagos.create');

