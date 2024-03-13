<?php

namespace App\Http\Controllers;

use App\Models\Espacio;
use App\Models\ServicioEvento;
use Illuminate\Http\Request;

class EspacioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $espacios = Espacio::all();
        return view('espacios.index', compact('espacios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $espacio = Espacio::findOrFail($id); // Busca el espacio por ID o falla si no se encuentra
        $servicios = ServicioEvento::all();
        return view('espacios.show', compact('espacio', "servicios")); // Retorna la vista con los datos del espacio
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
