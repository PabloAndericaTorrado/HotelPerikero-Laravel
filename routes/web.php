<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ReservaServicioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/habitaciones/cuenta', [HabitacionController::class, 'cuenta'])->name('habitaciones.cuenta');
Route::get('/habitaciones/contacto', [HabitacionController::class, 'contacto'])->name('habitaciones.contacto');
Route::resource('habitaciones', HabitacionController::class);
Route::resource('servicios', ServicioController::class);
Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index');
Route::resource('reservas', ReservaController::class);
Route::get('/reservas/create', [ReservaController::class, 'create'])->name('reservas.create');
Route::resource('reserva-servicios', ReservaServicioController::class);


Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', function () {
        return view('perfil');
    })->name('perfil');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
