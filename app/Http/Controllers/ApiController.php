<?php

namespace App\Http\Controllers;
use App\Models\Espacio;
use App\Models\Habitacion;
use App\Models\Resenia;
use App\Models\Reserva;
use App\Models\ReservaEvento;
use App\Models\ReservaParking;
use App\Models\ReservaParkingAnonimo;
use App\Models\ReservaServicio;
use App\Models\Servicio;
use App\Models\ServicioEvento;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function GetHabitaciones(): JsonResponse
    {

        $habitacion = Habitacion::get();

        return response()->json([
            'message' => 'Obtenidas ' . count($habitacion) . ' habitaciones',
            'data' => $habitacion
        ]);
    }

    public function GetHabitacionById(Request $request): JsonResponse
    {
        return response()->json([
            'data' => Habitacion::find($request->input('id'))
        ]);
    }

    public function GetEspacios(): JsonResponse
    {
        $espacio = Espacio::get();
        return response()->json([
           'message' => 'Obtenidas ' . count($espacio) . ' espacios',
           'data' => $espacio
        ]);
    }

    public function GetEspaciosById(Request $request): JsonResponse
    {
        return response()->json([
            'data' => Espacio::find($request->input('id'))
        ]);
    }

    public function GetResenias(): JsonResponse
    {
        $resenias = Resenia::get();
        return response()->json([
           'message' => 'Obtenidas ' . count($resenias) . ' resenias',
            'data' => $resenias
        ]);
    }

    public function GetReseniasById(Request $request): JsonResponse
    {
        return response()->json([
            'data' => Resenia::find($request->input('id'))
        ]);
    }

    public function GetReservas(): JsonResponse
    {
        $reservas = Reserva::get();
        return response()->json([
            'message' => 'Obtenidas ' . count($reservas) . ' reservas',
            'data' => $reservas
        ]);
    }

    public function GetReservasById(Request $request): JsonResponse
    {
        return response()->json([
            'data' => Reserva::find($request->input('id'))
        ]);
    }

    public function GetReservaEventos(): JsonResponse
    {
        $reservaEvento = ReservaEvento::get();
        return response()->json([
            'message' => 'Obtenidas ' . count($reservaEvento) . ' reservas de eventos',
            'data' => $reservaEvento
        ]);
    }

    public function GetReservaEventosById(Request $request): JsonResponse
    {
        return response()->json([
            'data' => ReservaEvento::find($request->input('id'))
        ]);
    }

    public function GetReservaParking(): JsonResponse
    {
        $reservaParking = ReservaParking::get();
        return response()->json([
            'message' => 'Obtenidas ' . count($reservaParking) . ' reservas de eventos',
            'data' => $reservaParking
        ]);
    }

    public function GetReservaParkingById(Request $request): JsonResponse
    {
        return response()->json([
            'data' => ReservaParking::find($request->input('id'))
        ]);
    }

    public function GetReservaParkingAnonimo(): JsonResponse
    {
        $reservaParkingAnonimo = ReservaParkingAnonimo::get();
        return response()->json([
            'message' => 'Obtenidas ' . count($reservaParkingAnonimo) . ' reservas de eventos',
            'data' => $reservaParkingAnonimo
        ]);
    }

    public function GetReservaParkingAnonimoById(Request $request): JsonResponse
    {
        return response()->json([
            'data' => ReservaParkingAnonimo::find($request->input('id'))
        ]);
    }

    public function GetReservaServicio(): JsonResponse
    {
        $reservaServicio = ReservaServicio::get();
        return response()->json([
            'message' => 'Obtenidas ' . count($reservaServicio) . ' reservas de eventos',
            'data' => $reservaServicio
        ]);
    }

    public function GetReservaServicioById(Request $request): JsonResponse
    {
        return response()->json([
            'data' => ReservaServicio::find($request->input('id'))
        ]);
    }

    public function GetServicios(): JsonResponse
    {
        $servicio = Servicio::get();
        return response()->json([
            'message' => 'Obtenidas ' . count($servicio) . ' reservas de eventos',
            'data' => $servicio
        ]);
    }

    public function GetServiciosById(Request $request): JsonResponse
    {
        return response()->json([
            'data' => ReservaServicio::find($request->input('id'))
        ]);
    }

    public function GetServicioEventos(): JsonResponse
    {
        $servicioEvento = Servicio::get();
        return response()->json([
            'message' => 'Obtenidas ' . count($servicioEvento) . ' reservas de eventos',
            'data' => $servicioEvento
        ]);
    }

    public function GetServicioEventosById(Request $request): JsonResponse
    {
        return response()->json([
            'data' => ServicioEvento::find($request->input('id'))
        ]);
    }

    //NO HAY QUE HACER EL DE USUARIOS.
}
