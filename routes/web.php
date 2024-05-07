<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EspacioController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\ReseniaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ReservaEventoController;
use App\Http\Controllers\ReservaParkingAnonimoController;
use App\Http\Controllers\ReservaParkingController;
use App\Http\Controllers\ReservaServicioController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\ImageLoader;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/habitaciones/cuenta', [HabitacionController::class, 'cuenta'])->name('habitaciones.cuenta');
Route::get('/habitaciones/contacto', [HabitacionController::class, 'contacto'])->name('habitaciones.contacto');
Route::resource('habitaciones', HabitacionController::class);
Route::resource('servicios', ServicioController::class);
Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index');

Auth::routes();
// web.php





Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', function () {
        return view('perfil');
    })->name('perfil');

    Route::resource('reservas', ReservaController::class);
    Route::resource('reserva-servicios', ReservaServicioController::class);
    Route::get('/habitaciones/show', [HabitacionController::class, 'show'])->name('habitaciones.show');
    Route::post('/habitaciones/filtrar', [HabitacionController::class, 'filtrar'])->name('habitaciones.filtrar');

    Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
    Route::get('/reservas/create/{id}', [ReservaController::class, 'create'])->name('reservas.create');
    Route::get('/reservas/{reserva}', [ReservaController::class, 'show'])->name('reservas.show');
    Route::delete('/reservas/{reserva}/delete', [ReservaController::class, 'destroy'])->name('reservas.delete');
    Route::get('/reservas/{reserva}/delete-view', [ReservaController::class, 'showDeleteView'])->name('reservas.delete.view');
    Route::get('/send-welcome-email', [EmailController::class, 'sendWelcomeEmail']);
    Route::get('/reserva/{id}/pdf', [ReservaController::class, 'generatePDF'])->name('reserva.pdf');
    Route::get('/reservas/{reserva}/resenias/crear', [ReseniaController::class, 'create'])->name('resenias.create');
    Route::post('/reservas/{reserva}/resenias', [ReseniaController::class, 'store'])->name('resenias.store');
    Route::get('/resenias', [ReseniaController::class, 'index'])->name('resenias.index');
    Route::get('/reservas/{reserva}/resenias', [ReseniaController::class, 'show'])->name('resenias.show');
    Route::get('/reserva-eventos', [ReservaEventoController::class, 'index'])->name('reserva_eventos.index');
    Route::get('/espacios', [EspacioController::class, 'index'])->name('espacios.index');
    Route::get('/espacios/{id}', [EspacioController::class, 'show'])->name('espacios.show');
    Route::get('/reserva_eventos/create/{espacio}', [ReservaEventoController::class, 'create'])->name('reserva_eventos.create');
    Route::post('/reserva_eventos', [ReservaEventoController::class, 'store'])->name('reserva_eventos.store');
    Route::delete('/reserva_eventos/{reserva_evento}', [ReservaEventoController::class, 'destroy'])->name('reserva_eventos.delete');



});


Route::middleware(['role:parking'])->group(function () {
    Route::get('/worker/parking', [AdminController::class, 'parking'])->name('worker.parking');
});

Route::post('/check-parking-availability', [ReservaParkingController::class, 'checkParkingAvailability']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
Route::get('/reservas/create/{id}', [ReservaController::class, 'create'])->name('reservas.create');
Route::get('/reservas/{reserva}', [ReservaController::class, 'show'])->name('reservas.show');
Route::get('/habitaciones/{habitacion}', 'HabitacionController@show')->name('habitaciones.show');
Route::delete('/reservas/{reserva}/delete', [ReservaController::class, 'destroy'])->name('reservas.delete');
Route::get('/reservas/{reserva}/delete-view', [ReservaController::class, 'showDeleteView'])->name('reservas.delete.view');
Route::post('/actualizar-usuario', [UserController::class, 'actualizar'])->name('actualizar-usuario');

// Rutas protegidas por middleware 'role:admin'
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/today-reservations', [AdminController::class, 'todayReservations'])->name('admins.today_reservations');
    Route::get('/admin/create-reservation', [AdminController::class, 'createReservations'])->name('admins.create_reservation');
    Route::get('/admin/today-reservations', [ReservaController::class, 'todayReservations'])->name('admins.today_reservations');
    Route::patch('/admin/reservas/{reserva}/cancel', [ReservaController::class, 'cancelReservation'])->name('reservas.cancel');
    Route::patch('/reservas/{reserva}/confirmar', [ReservaController::class, 'confirmarReserva'])->name('reservas.confirm');
    Route::get('/admin/create-reservation', [ReservaController::class, 'createReservationForm'])->name('admins.create_reservation');
    Route::post('/admin/create-reservation', [ReservaController::class, 'store2'])->name('reservas.store2');


});
Route::get('/worker/parking', [ReservaParkingController::class, 'index'])->name('parking');
Route::post('/get-parking-reservations', [ReservaController::class, 'getParkingReservations']);
Route::get('/parking-day', [ReservaParkingController::class, 'showParkingDay'])->name('parking_day');
Route::get('/movimientos', [ReservaParkingController::class, 'showMovimientos'])->name('movimientos');
Route::post('/movimientos/registrar', [ReservaParkingController::class, 'registrarMovimiento'])->name('movimientos.registrar');
Route::get('/factura/{reservaAnonima}', [ReservaParkingAnonimoController::class, 'mostrarFactura'])->name('factura.mostrar');
Route::post('/factura/{reservaAnonima}/pagar', [ReservaParkingAnonimoController::class, 'marcarComoPagada'])->name('factura.pagar');
Route::post('/parking/reservas', [ReservaParkingController::class, 'getReservasParking'])->name('parking_reservas');
Route::post('/precio_parking',[ReservaParkingAnonimoController::class, 'actualizarPrecioPorHora'])->name('cambiar_precio_parking');




