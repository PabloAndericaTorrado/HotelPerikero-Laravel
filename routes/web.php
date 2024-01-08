<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('usuarios', 'UsuarioController');
Route::resource('habitaciones', 'HabitacionController');
Route::resource('reservas', 'ReservaController');
Route::resource('servicios', 'ServicioController');
Route::resource('reserva-servicios', 'ReservaServicioController');


use App\Http\Controllers\HabitacionController;

Route::resource('habitaciones', HabitacionController::class);
