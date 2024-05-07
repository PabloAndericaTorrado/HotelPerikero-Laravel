<?php

namespace App\Http\Controllers;
use App\Models\Espacio;
use App\Models\Habitacion;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function GetHabitaciones(): \Illuminate\Http\JsonResponse
    {

        $habitacion = Habitacion::get();

        return response()->json([
            'message' => 'Obtenidas ' . count($habitacion) . ' habitaciones',
            'data' => $habitacion
        ]);
    }

    public function GetHabitacionById(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => Habitacion::find($request->input('id'))
        ]);
    }

    public function GetEspacios(): \Illuminate\Http\JsonResponse
    {
        $espacio = Espacio::get();
        return response()->json([
           'message' => 'Obtenidas ' . count($espacio) . ' espacios',
           'data' => $espacio
        ]);
    }

    public function GetEspaciosById(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => Espacio::find($request->input('id'))
        ]);
    }
}
