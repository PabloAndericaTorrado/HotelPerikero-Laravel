<?php

namespace App\Http\Controllers;

use App\Models\ServicioEvento;
use Illuminate\Http\Request;

class ServicioEventoController extends Controller
{
    public function index()
    {
        $serviciosEventos = ServicioEvento::all();
        return view('serviciosEventos.index', compact('serviciosEventos'));
    }

    public function create()
    {
        return view('serviciosEventos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
        ]);

        ServicioEvento::create($request->all());

        return redirect()->route('serviciosEventos.index')->with('success', 'Servicio para reserva_eventos creado con éxito.');
    }

}
