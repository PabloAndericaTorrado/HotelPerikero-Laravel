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

    // Resto de las funciones (create, store, show, edit, update, destroy)...
}
