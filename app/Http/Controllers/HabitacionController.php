<?php

// app/Http/Controllers/HabitacionController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion; // Asegúrate de que estás utilizando el modelo correcto

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
        // Lógica para mostrar los detalles de una habitación específica
        $habitacion = Habitacion::findOrFail($id);

        return view('habitaciones.show', compact('habitacion'));
    }

}
