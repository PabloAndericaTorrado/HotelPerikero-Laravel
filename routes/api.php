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

Route::get('helloWorld', [ApiController::class, 'HelloWorld']);
Route::get('habitaciones', [ApiController::class, 'GetHabitaciones']);
Route::post('habitaciones', [ApiController::class, 'GetHabitacionById']);
Route::get('espacios', [ApiController::class, 'GetEspacios']);
Route::post('espacios', [ApiController::class, 'GetEspaciosById']);

