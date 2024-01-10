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

    }

}
