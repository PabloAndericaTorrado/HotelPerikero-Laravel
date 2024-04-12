<?php

namespace App\Http\Controllers;

use App\Models\FacturaHabitacion;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;

class FacturaHabitacionController extends Controller
{
    //
    public function generarFactura(Request $request, $reservaId)
    {
        $reserva = Reserva::findOrFail($reservaId);
        $usuario = User::findOrFail($reserva->users_id);


        $factura = new FacturaHabitacion();
        $factura->reserva_id = $reservaId;
        $factura->fecha_expedicion = now();
        $factura->correo_huesped = $usuario->email;
        $factura->fecha_check_in = $reserva->check_in;
        $factura->fecha_check_out = $reserva->check_out;
        $factura->monto = $reserva->calculateTotalPriceWithServices();
        $factura->save();

    }
}
