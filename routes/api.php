<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('habitaciones', [ApiController::class, 'GetHabitaciones']);
Route::post('habitaciones', [ApiController::class, 'GetHabitacionById']);
Route::get('servicios', [ApiController::class, 'GetServicios']);
Route::post('servicios', [ApiController::class, 'GetServiciosById']);
Route::get('espacios', [ApiController::class, 'GetEspacios']);
Route::post('espacios', [ApiController::class, 'GetEspaciosById']);
Route::get('resenias', [ApiController::class, 'GetResenias']);
Route::post('resenias', [ApiController::class, 'GetReseniasById']);
Route::get('reservas', [ApiController::class, 'GetReservas']);
Route::post('reservas', [ApiController::class, 'GetReservasById']);
Route::get('reservaEventos', [ApiController::class, 'GetReservaEventos']);
Route::post('reservaEventos', [ApiController::class, 'GetReservaEventosById']);
Route::get('servicioEventos', [ApiController::class, 'GetServicioEventos']);
Route::post('servicioEventos', [ApiController::class, 'GetServicioEventosById']);
Route::get('reservaParking', [ApiController::class, 'GetReservaParking']);
Route::post('reservaParking', [ApiController::class, 'GetReservaParkingById']);
Route::get('reservaParkingAnonimo', [ApiController::class, 'GetReservaParkingAnonimo']);
Route::post('reservaParkingAnonimo', [ApiController::class, 'GetReservaParkingAnonimoById']);
Route::get('reservaServicio', [ApiController::class, 'GetReservaServicio']);
Route::post('reservaServicio', [ApiController::class, 'GetReservaServicioById']);
Route::post('login', [ApiController::class, 'Login']);
Route::get('facturasParking', [ApiController::class, 'GetFacturasParking']);
Route::post('facturasParking', [ApiController::class, 'GetFacturasParkingById']);
Route::get('facturasHabitacion', [ApiController::class, 'GetFacturasHabitacion']);
Route::post('facturasHabitacion', [ApiController::class, 'GetFacturasHabitacionById']);
Route::get('facturasEventos', [ApiController::class, 'GetFacturasEventos']);
Route::post('facturasEventos', [ApiController::class, 'GetFacturasEventosById']);
Route::post('reservas/create', [ApiController::class, 'CreateReserva']);
Route::post('reservaEventos/create', [ApiController::class, 'CreateReservaEvento']);
Route::get('reservas/lastId', function () {
    $lastId = DB::table('reservas')->latest('id')->value('id');
    return response()->json(['last_id' => $lastId]);
});
Route::post('reservaServicios/create', [ApiController::class, 'CreateReservaServicio']);


