<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
use App\Models\Servicio;
class HabitacionController extends Controller
{
    public function index()
    {
        $habitaciones = Habitacion::all();
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
