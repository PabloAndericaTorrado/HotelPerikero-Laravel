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
}
