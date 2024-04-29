<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
use App\Models\Servicio;
use Illuminate\Support\Facades\Log;

class HabitacionController extends Controller
{
    public function index()
    {
        $habitaciones = Habitacion::all();
        return view('habitaciones.index', compact('habitaciones'));
    }

    public function filtrar(Request $request)
    {
        // Recuperar los valores de los filtros del Request
        $capacidad = $request->input('capacidad');
        $vistas = $request->input('vistas');
        $balcon = $request->input('balcon');
        $mascotas = $request->has('mascotas');
        $fumadores = $request->has('fumadores');
        $query = Habitacion::query();

        if ($capacidad) {
            $query->where('capacidad', '>=', $capacidad);
        }
        $caracteristicas = [];
        if ($vistas) {
            $caracteristicas[] = $vistas;
        }
        if ($balcon) {
            $caracteristicas[] = $balcon;
        }
        if ($mascotas) {
            $caracteristicas[] = 'mascotas';
        }
        if ($fumadores) {
            $caracteristicas[] = 'fumadores';
        }
        if (!empty($caracteristicas)) {
            $caracteristicasString = implode(',', $caracteristicas);
            $query->where('caracteristicas', 'LIKE', "%$caracteristicasString%");
        }
        $habitaciones = $query->get();
        return view('habitaciones.index', compact('habitaciones'));
    }

    public function contacto()
    {
        return view('habitaciones.contacto');
    }

    public function show($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        $servicios = Servicio::all();

        return view('habitaciones.show', compact('habitacion', 'servicios'));
    }

    public function cuenta()
    {
        $user = auth()->user(); // Obtener el usuario autenticado
        return view('habitaciones.cuenta', compact('user'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }


}
