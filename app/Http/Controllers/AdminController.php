<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use App\Models\Parking;
use App\Models\Reserva;
use App\Models\Servicio;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admins.dashboard');
    }

    public function parking(){
        return view ('workers.parking');
    }

    public function todayReservations()
    {
        $today = Carbon::now()->format('Y-m-d');
        $reservasHoy = Reserva::with('usuario')->whereDate('check_in', $today)->get();

        return view('admins.today_reservations', compact('reservasHoy'));
    }

    public function createReservations()
    {
        $habitaciones = Habitacion::all();
        $servicios = Servicio::all();
        $fechasReservadas = $this->getFechasReservadas($habitaciones->first()->id);
        $plazasParking = Parking::all();

        return view('admins.create_reservation', compact('habitaciones', 'servicios', 'fechasReservadas', 'plazasParking'));
    }

}
