<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\SocioController;
use App\Http\Controllers\DeudaController;
use App\Http\Controllers\userController;


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
Route::get('socios-deudas/{socio}',[SocioController::class,'show_deuda'])->name('socios.deuda');

Route::resource('deudas',DeudaController::class);

