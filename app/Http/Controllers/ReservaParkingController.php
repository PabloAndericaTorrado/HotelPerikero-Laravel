<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use App\Models\Parking;
use App\Models\ReservaParking;
use App\Models\User;
use Carbon\Carbon;
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
        $plazasOcupadas = ReservaParking::where(function ($query) use ($fechaInicio, $fechaFin) {
            // Se revisa si alguna reserva existente comienza antes o igual que la fecha de fin solicitada
            // y termina después o igual que la fecha de inicio solicitada
            $query->where('fecha_inicio', '<=', $fechaFin)
                ->where('fecha_fin', '>=', $fechaInicio);
        })->pluck('parking_id');

        return response()->json($plazasOcupadas);
    }

    public function showParkingDay()
    {
        $fechaActual = Carbon::now()->toDateString();

        $reservas = ReservaParking::whereDate('fecha_inicio', '<=', $fechaActual)
            ->whereDate('fecha_fin', '>=', $fechaActual)
            ->select('parking_id', 'matricula', 'salida_registrada')
            ->get();

        $reservasData = [];
        foreach ($reservas as $reserva) {
            $reservasData[$reserva->parking_id] = [
                'matricula' => $reserva->matricula,
                'salida_registrada' => $reserva->salida_registrada
            ];
        }

        $plazasParking = Parking::all();

        // Pasar los datos a la vista
        return view('workers.parking_day', compact('fechaActual', 'plazasParking', 'reservasData'));
    }

    public function showMovimientos()
    {
        return view('workers.movimientos');

    }

    public function registrarMovimiento(Request $request)
    {
        $accion = $request->input('accion');

        if ($accion === 'entrada') {
            $request->validate([
                'matricula-entrada' => 'required|string|max:255',
            ]);

            $matricula = $request->input('matricula-entrada');

            // Verificar si ya existe una reserva con la matrícula proporcionada
            $reservaExistente = ReservaParking::where('matricula', $matricula)->first();

            if ($reservaExistente) {
                $reservaExistente->update(['salida_registrada' => false]);
                return redirect()->route('movimientos')->with('success', 'El coche ha ingresado exitosamente al parking.');
            }

            // Aquí puedes agregar la lógica para registrar la entrada del vehículo
            // Por ejemplo, puedes crear una nueva reserva de estacionamiento

            return redirect()->route('movimientos')->with('success', 'El coche ha ingresado exitosamente al parking.');

        } elseif ($accion === 'salida') {
            $request->validate([
                'matricula' => 'required|string|max:255',
            ]);

            $matricula = $request->input('matricula');

            $reserva = ReservaParking::where('matricula', $matricula)->first();

            if ($reserva) {
                $reserva->update(['salida_registrada' => true]);
                return redirect()->route('movimientos')->with('success', 'El coche ha salido exitosamente del parking.');
            } else {
                // Si la matrícula no coincide con ninguna reserva, mostrar un mensaje de error
                return redirect()->route('movimientos')->with('error', 'La matrícula proporcionada no corresponde a ninguna reserva.');
            }
        }

        // Redirigir de vuelta a la vista de movimientos
        return redirect()->route('movimientos');
    }
}
