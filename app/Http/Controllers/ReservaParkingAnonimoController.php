<?php

namespace App\Http\Controllers;

use App\Models\ReservaParkingAnonimo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ReservaParkingAnonimoController extends Controller
{

    public static function calcularFactura(ReservaParkingAnonimo $reservaAnonima)
    {
        $fechaHoraEntrada = $reservaAnonima->fecha_hora_entrada;

        $fechaHoraActual = Carbon::now();
        $diferenciaHoras = $fechaHoraActual->diffInHours($fechaHoraEntrada);

        $tarifaPorHora = 1.5;

        return $tarifaPorHora * $diferenciaHoras;
    }

    public function mostrarFactura(Request $request, ReservaParkingAnonimo $reservaAnonima)
    {
        $factura = self::calcularFactura($reservaAnonima);

        return View::make('workers.parking_factura', ['factura' => $factura, 'reservaAnonima' => $reservaAnonima]);
    }

    public function marcarComoPagada(Request $request, ReservaParkingAnonimo $reservaAnonima)
    {
        $reservaAnonima->update(['salida_registrada' => true]);
        return redirect()->route('movimientos')->with('success', 'El coche ha salido exitosamente del parking.');
    }
}
