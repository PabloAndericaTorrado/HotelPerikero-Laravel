<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use App\Models\ReservaParking;
use App\Models\User;
use Illuminate\Http\Request;

class ReservaParkingController extends Controller
{
    public function index()
    {
        $reservasParking = ReservaParking::all();
        $habitaciones = Habitacion::all();
        $usuarios = User::all();
        return view('workers.parking', compact('reservasParking', 'habitaciones', 'usuarios'));
    }

    public function checkParkingAvailability(Request $request)
    {
        $fechaInicio = $request->input('check_in');
        $fechaFin = $request->input('check_out');

        // La consulta debería buscar reservas que solapen las fechas de interés
        $plazasOcupadas = ReservaParking::where(function($query) use ($fechaInicio, $fechaFin) {
            // Se revisa si alguna reserva existente comienza antes o igual que la fecha de fin solicitada
            // y termina después o igual que la fecha de inicio solicitada
            $query->where('fecha_inicio', '<=', $fechaFin)
                ->where('fecha_fin', '>=', $fechaInicio);
        })->pluck('parking_id');

        return response()->json($plazasOcupadas);
    }

}
