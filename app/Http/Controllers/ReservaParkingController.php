<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use App\Models\Parking;
use App\Models\ReservaParking;
use App\Models\ReservaParkingAnonimo;
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
            $query->where('fecha_inicio', '<=', $fechaFin)
                ->where('fecha_fin', '>=', $fechaInicio);
        })->pluck('parking_id');

        return response()->json($plazasOcupadas);
    }

    public function showParkingDay()
    {
        $fechaActual = Carbon::now()->toDateString();

        // Obtener todas las reservas de parking para el día actual
        $reservas = ReservaParking::whereDate('fecha_inicio', '<=', $fechaActual)
            ->whereDate('fecha_fin', '>=', $fechaActual)
            ->select('parking_id', 'matricula', 'salida_registrada')
            ->get();

        // Obtener todas las reservas anónimas para el día actual con salida no registrada
        $reservasAnonimas = ReservaParkingAnonimo::where('salida_registrada', false)
            ->select('parking_id', 'matricula')
            ->get();


        // Combinar las reservas de usuarios y las reservas anónimas
        $reservasData = [];
        foreach ($reservas as $reserva) {
            $reservasData[$reserva->parking_id] = [
                'matricula' => $reserva->matricula,
                'salida_registrada' => $reserva->salida_registrada
            ];
        }
        foreach ($reservasAnonimas as $reservaAnonima) {
            $reservasData[$reservaAnonima->parking_id] = [
                'matricula' => $reservaAnonima->matricula,
                'salida_registrada' => $reservaAnonima->salida_registrada
            ];
        }
        $plazasParking = Parking::all();
        return view('workers.parking_day', compact('fechaActual', 'plazasParking', 'reservasData'));
    }


    public function showMovimientos()
    {
        $reservas = ReservaParking::where('salida_registrada', false)->get();

        $reservasAnonimas = ReservaParkingAnonimo::where('salida_registrada', false)->get();

        $matriculas = [];
        foreach ($reservas as $reserva) {
            $matriculas[] = $reserva->matricula;
        }
        foreach ($reservasAnonimas as $reservaAnonima) {
            $matriculas[] = $reservaAnonima->matricula;
        }

        return view('workers.movimientos', compact('matriculas'));
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
            } else {
                $plazasReservadas = ReservaParking::pluck('parking_id')->toArray();

                $plazasDisponibles = Parking::whereNotIn('id', $plazasReservadas)->get();

                $plazaAleatoria = $plazasDisponibles->random();

                ReservaParkingAnonimo::create([
                    'matricula' => $matricula,
                    'fecha_hora_entrada' => now(),
                    'parking_id' => $plazaAleatoria->id,
                    'salida_registrada' => false,
                ]);

            }


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
                $reservaAnonima = ReservaParkingAnonimo::where('matricula', $matricula)->first();

                if ($reservaAnonima) {
                    $factura = ReservaParkingAnonimoController::calcularFactura($reservaAnonima);

                    return view('workers.parking_factura', compact('factura', 'reservaAnonima'));


                } else {
                    return redirect()->route('movimientos')->with('error', 'La matrícula proporcionada no corresponde a ninguna reserva.');
                }
            }
        }
        return redirect()->route('movimientos');
    }

    public function getReservasParking()
    {
        $reservas = ReservaParking::all();
        $reservasAnonimas = ReservaParkingAnonimo::all();

        $reservasTransformadas = $reservas->flatMap(function ($reserva) {
            $inicio = Carbon::parse($reserva->fecha_inicio);
            $fin = Carbon::parse($reserva->fecha_fin);
            $diasReserva = $inicio->diffInDays($fin);

            return collect(range(0, $diasReserva))->map(function ($d) use ($reserva, $inicio) {
                $dia = $inicio->copy()->addDays($d);
                return [
                    'title' => 'Reserva: ' . $reserva->matricula,
                    'start' => $dia,
                    'end' => $dia->copy()->endOfDay(),
                    'color' => '#FF5733',
                ];
            });
        });

        // Transformar reservas anónimas
        $reservasAnonimasTransformadas = $reservasAnonimas->map(function ($reservaAnonima) {
            $inicio = Carbon::parse($reservaAnonima->fecha_hora_entrada);
            $fin = $inicio->copy()->endOfDay();

            return [
                'title' => 'Reserva: ' . $reservaAnonima->matricula,
                'start' => $inicio,
                'end' => $fin,
                'color' => '#3371FF',
            ];
        });

        $reservasTotales = $reservasTransformadas->concat($reservasAnonimasTransformadas);

        return response()->json($reservasTotales);
    }

}
