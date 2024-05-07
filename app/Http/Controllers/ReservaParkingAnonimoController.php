<?php

namespace App\Http\Controllers;

use App\Models\FacturaParking;
use App\Models\ReservaParkingAnonimo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ReservaParkingAnonimoController extends Controller
{
    public static $precioPorHora = 1.5;

    public function actualizarPrecioPorHora(Request $request): void
    {
        self::$precioPorHora = $request->input('precioHora', 1.5);

    }

    public static function calcularFactura(ReservaParkingAnonimo $reservaAnonima)
    {
        $fechaHoraEntrada = $reservaAnonima->fecha_hora_entrada;

        $fechaHoraActual = Carbon::now();
        $diferenciaHoras = $fechaHoraActual->diffInHours($fechaHoraEntrada);
        $precio = self::$precioPorHora;

        return $precio * $diferenciaHoras;
    }

    public function mostrarFactura(Request $request, ReservaParkingAnonimo $reservaAnonima)
    {
        $factura = self::calcularFactura($reservaAnonima);

        return View::make('workers.parking_factura', ['factura' => $factura, 'reservaAnonima' => $reservaAnonima]);
    }

    public function marcarComoPagada(Request $request, ReservaParkingAnonimo $reservaAnonima)
    {
        $montoFactura = self::calcularFactura($reservaAnonima);

        $factura = new FacturaParking();
        $factura->matricula = $reservaAnonima->matricula;
        $factura->fecha_hora_entrada = $reservaAnonima->fecha_hora_entrada;
        $factura->fecha_hora_salida = now();
        $factura->monto = $montoFactura;
        $factura->save();

        $reservaAnonima->update(['salida_registrada' => true]);
        return redirect()->route('movimientos')->with('success', 'El coche ha salido exitosamente del parking.');
    }
}
