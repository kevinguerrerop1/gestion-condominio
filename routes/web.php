<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CondominioController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\InquilinoController;
use App\Http\Controllers\GastoComunController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReporteController;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('condominios', CondominioController::class);
Route::resource('blocks', BlockController::class);
Route::resource('inquilinos', InquilinoController::class);
Route::resource('gastos-comunes', GastoComunController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
Route::get('/reportes/consulta-rut', [ReporteController::class, 'consultaRut'])->name('reportes.consulta-rut');
Route::post('/reportes/consulta-rut', [ReporteController::class, 'buscarRut'])->name('reportes.buscar-rut');
