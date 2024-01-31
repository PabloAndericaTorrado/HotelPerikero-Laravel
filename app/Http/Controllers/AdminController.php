<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        // Lógica para obtener y mostrar las reservas de hoy
        return view('admins.create_reservation');
    }

}
