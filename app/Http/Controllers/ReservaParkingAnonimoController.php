<?php

namespace App\Http\Controllers;

use App\Models\ReservaParkingAnonimo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservaParkingAnonimoController extends Controller
{

    public static function calcularFactura(ReservaParkingAnonimo $reservaAnonima)
    {
        $fechaHoraEntrada = $reservaAnonima->fecha_hora_entrada;

        $fechaHoraActual = Carbon::now();
        $diferenciaHoras = $fechaHoraActual->diffInHours($fechaHoraEntrada);

        $tarifaPorHora = 1;
        $montoFactura = $tarifaPorHora * $diferenciaHoras;

        return $montoFactura;
    }
}
