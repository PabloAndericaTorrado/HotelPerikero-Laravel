<?php

namespace App\Http\Controllers;

use App\Models\ReservaParking;
use Illuminate\Http\Request;

class ReservaParkingController extends Controller
{
    public function index()
    {
        $reservasParking = ReservaParking::all();
        return view('workers.parking', compact('reservasParking'));
    }
}
