<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio; // Asegúrate de importar el modelo Servicio

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all(); // Obtener todos los servicios desde la base de datos

        return view('servicios.index', compact('servicios'));
        // La vista 'servicios.index' debe existir y puede recibir la variable $servicios
        // Puedes ajustar el nombre de la vista según la estructura de tus carpetas
    }
}
