<?php

namespace App\Http\Controllers;

use App\Models\Espacio;
use App\Models\FacturaEventos;
use App\Models\FacturaHabitacion;
use App\Models\FacturaParking;
use App\Models\Habitacion;
use App\Models\Resenia;
use App\Models\Reserva;
use App\Models\ReservaEvento;
use App\Models\ReservaParking;
use App\Models\ReservaParkingAnonimo;
use App\Models\ReservaServicio;
use App\Models\Servicio;
use App\Models\ServicioEvento;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function CreateReserva(Request $request): JsonResponse
{
    $reserva = new Reserva();
    $reserva->users_id = $request->input('users_id');
    $reserva->habitacion_id = $request->input('habitacion_id');
    $reserva->check_in = $request->input('check_in');
    $reserva->check_out = $request->input('check_out');
    $reserva->precio_total = $request->input('precio_total');
    $reserva->pagado = $request->input('pagado');
    $reserva->confirmado = $request->input('confirmado');
    $reserva->dni = $request->input('dni');
    $reserva->numero_personas = $request->input('numero_personas');
    $reserva->created_at = $request->input('created_at');
    $reserva->updated_at = $request->input('updated_at');

    if ($reserva->save()) {
        return response()->json([
            'message' => 'Reserva creada exitosamente',
            'data' => $reserva
        ], 201);
    } else {
        return response()->json([
            'message' => 'Error al crear la reserva'
        ], 500);
    }
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
        $servicioEvento =ServicioEvento::get();
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

    public function Login(Request $request): JsonResponse
    {
        $user = User::where('email', $request->input('email'))->first();

        return $user && Hash::check($request->input('password'), $user->password) ?
            response()->json([
                'data' => $user,
                'message' => 'Usuario logeado correctamente'
            ], 200) :
            response()->json([
                'message' => 'El email o la contraseña son incorrectos'
            ], 220);
    }

    public function GetFacturasEventos(): JsonResponse
    {
        $facturasEventos = FacturaEventos::get();
        return response()->json([
            'message' => 'Obtenidas ' . count($facturasEventos) . ' facturas de eventos',
            'data' => $facturasEventos
        ]);
    }

    public function GetFacturasEventosById(Request $request): JsonResponse
    {
        return response()->json([
            'data' => FacturaEventos::find($request->input('id'))
        ]);
    }

    public function GetFacturasParking(): JsonResponse
    {
        $facturasParking = FacturaParking::get();
        return response()->json([
            'message' => 'Obtenidas ' . count($facturasParking) . ' facturas de parking',
            'data' => $facturasParking
        ]);
    }

    public function GetFacturasParkingById(Request $request): JsonResponse
    {
        return response()->json([
            'data' => FacturaParking::find($request->input('id'))
        ]);
    }

    public function GetFacturasHabitacion(): JsonResponse
    {
        $facturasHabitacion = FacturaHabitacion::get();
        return response()->json([
            'message' => 'Obtenidas ' . count($facturasHabitacion) . ' facturas de habitación',
            'data' => $facturasHabitacion
        ]);
    }

    public function GetFacturasHabitacionById(Request $request): JsonResponse
    {
        return response()->json([
            'data' => FacturaHabitacion::find($request->input('id'))
        ]);
    }


}
