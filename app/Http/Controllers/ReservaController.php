<?php

// app/Http/Controllers/ReservaController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::all();
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        // Lógica para mostrar el formulario de creación
        return view('reservas.create');
    }

    public function store(Request $request)
    {
        // Lógica para almacenar la reserva en la base de datos
        // Asegúrate de validar los datos del formulario antes de almacenarlos

        // Ejemplo:
        Reserva::create([
            'user_id' => $request->user_id,
            'habitacion_id' => $request->habitacion_id,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            // ... otras columnas de la tabla de reservas
        ]);

        return redirect()->route('reservas.index')->with('success', 'Reserva creada con éxito');
    }

    public function show(Reserva $reserva)
    {
        // Lógica para mostrar los detalles de una reserva específica
        return view('reservas.show', compact('reserva'));
    }

    public function edit(Reserva $reserva)
    {
        // Lógica para mostrar el formulario de edición
        return view('reservas.edit', compact('reserva'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        // Lógica para actualizar la reserva en la base de datos
        // Asegúrate de validar los datos del formulario antes de actualizarlos

        // Ejemplo:
        $reserva->update([
            'user_id' => $request->user_id,
            'habitacion_id' => $request->habitacion_id,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            // ... otras columnas de la tabla de reservas
        ]);

        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada con éxito');
    }

    public function destroy(Reserva $reserva)
    {
        // Lógica para eliminar una reserva específica
        $reserva->delete();

        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada con éxito');
    }
}
