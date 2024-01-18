<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\ImageLoader;
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
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/habitaciones/cuenta', [HabitacionController::class, 'cuenta'])->name('habitaciones.cuenta');
Route::get('/habitaciones/contacto', [HabitacionController::class, 'contacto'])->name('habitaciones.contacto');
Route::get('/habitaciones/show', [HabitacionController::class, 'show'])->name('habitaciones.show');
Route::resource('habitaciones', HabitacionController::class);
Route::resource('servicios', ServicioController::class);
Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index');
Route::resource('reservas', ReservaController::class);
Route::resource('reserva-servicios', ReservaServicioController::class);
Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', function () {
        return view('perfil');
    })->name('perfil');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
Route::get('/reservas/create/{id}', [ReservaController::class, 'create'])->name('reservas.create');
Route::resource('reservas', ReservaController::class);
Route::get('/reservas/{reserva}', [ReservaController::class, 'show'])->name('reservas.show');
Route::get('/habitaciones/{habitacion}', 'HabitacionController@show')->name('habitaciones.show');
Route::delete('/reservas/{reserva}/delete', [ReservaController::class, 'destroy'])->name('reservas.delete');
Route::get('/reservas/{reserva}/delete-view', [ReservaController::class, 'showDeleteView'])->name('reservas.delete.view');






