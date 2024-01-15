<?php

// app/Http/Controllers/ReservaController.php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::all();
        return view('reservas.index', compact('reservas'));
    }

    public function create($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        return view('reservas.create', compact('habitacion'));
    }

    public function store(Request $request)
    {
        $reserva = Reserva::create([
            'users_id' => Auth::id(),
            'habitacion_id' => $request->habitacion_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'precio_total' => 0,
            'pagado' => true
        ]);

        $reserva->precio_total = $reserva->calculateTotalPrice();
        $reserva->save();

        // Redirige a la vista de detalles de la reserva recién creada
        return redirect()->route('reservas.show', $reserva->id)->with('success', 'Reserva creada con éxito');
    }


    public function show(Reserva $reserva)
    {
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

    public function mostrarCuenta()
    {
        $user = User::with('reservas')->find(auth()->id());

        // Mensajes de depuración
        Log::info($user->reservas); // Verifica las fechas en los registros de reserva

        return view('habitaciones.cuenta', compact('user'));
    }


}
