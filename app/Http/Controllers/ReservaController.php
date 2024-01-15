<?php

// app/Http/Controllers/ReservaController.php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;


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

        $habitacionId = $request->habitacion_id;
        $checkIn = $request->check_in;
        $checkOut = $request->check_out;

        if (!$this->habitacionDisponible($habitacionId, $checkIn, $checkOut)) {
            throw ValidationException::withMessages(['error' => 'La habitación no está disponible para las fechas seleccionadas.']);
        }

        $reserva = Reserva::create([
            'users_id' => Auth::id(),
            'habitacion_id' => $habitacionId,
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'precio_total' => 0,
            'pagado' => true
        ]);

        $reserva->precio_total = $reserva->calculateTotalPrice();
        $reserva->save();

        return redirect()->route('reservas.show', $reserva->id)->with('success', 'Reserva creada con éxito');    }

// Función para verificar la disponibilidad de la habitación
    protected function habitacionDisponible($habitacionId, $checkIn, $checkOut)
    {
        return Reserva::where('habitacion_id', $habitacionId)
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out', [$checkIn, $checkOut])
                    ->orWhere(function ($query) use ($checkIn, $checkOut) {
                        $query->where('check_in', '<=', $checkIn)
                            ->where('check_out', '>=', $checkOut);
                    });
            })
            ->doesntExist();
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
