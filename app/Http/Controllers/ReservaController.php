<?php

// app/Http/Controllers/ReservaController.php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use App\Models\Parking;
use App\Models\ReservaParking;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
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

        // Obtener las fechas reservadas para la habitación
        $fechasReservadas = $this->getFechasReservadas($id);
        $servicios = Servicio::all();

        return view('reservas.create', compact('habitacion', 'fechasReservadas','servicios'));
    }

    // Método para obtener las fechas reservadas de una habitación
    protected function getFechasReservadas($habitacionId)
    {
        $reservas = Reserva::where('habitacion_id', $habitacionId)->get();

        $fechasReservadas = [];

        foreach ($reservas as $reserva) {
            $fechasReservadas[] = [
                'from' => $reserva->check_in,
                'to' => $reserva->check_out,
            ];
        }

        return $fechasReservadas;
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

// Asociar servicios seleccionados (si se eligieron)º
        if ($request->has('servicios') && is_array($request->input('servicios'))) {
            $servicios = [];
            foreach ($request->input('servicios') as $servicioId) {
                $servicios[$servicioId] = ['cantidad' => 5]; // Puedes ajustar la cantidad según tus necesidades
            }
            $reserva->servicios()->attach($servicios);
        }

// Calcular el precio total y actualizar la reserva
        $reserva->precio_total = $reserva->calculateTotalPrice();
        if ($request->has('reservar_parking')) {

            $plazaParking = Parking::where('disponible', true)->first();

            // Verificar si se encontró una plaza de estacionamiento disponible
            if ($plazaParking) {
                // Crear la reserva de estacionamiento con la plaza disponible
                $reservaParking = new ReservaParking([
                    'matricula' => $request->input('matricula_parking') ?? 'Sin matrícula',
                    'fecha_inicio' => now(),
                    'fecha_fin' => now(),  // Ajusta según tu lógica
                    'reserva_habitacion_id' => $reserva->id,  // Cambia a la relación de habitación si es necesario
                    'reserva_parking_id' => $plazaParking->id,
                ]);

                $reservaParking->save();
            } else {
                return redirect()->back()->with('error', 'Lo sentimos, no hay plazas de estacionamiento disponibles en este momento.');
            }
        }
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
        // Eliminar los registros relacionados en la tabla reserva_servicios
        $reserva->servicios()->detach();

        // Ahora puedes eliminar la reserva
        $reserva->delete();

        return redirect()->route('habitaciones.index')->with('success', 'Reserva eliminada con éxito');
    }

    public function mostrarCuenta()
    {
        $user = User::with(['reservas', 'reservas.servicios'])->find(auth()->id());

        return view('habitaciones.cuenta', compact('user'));
    }
    public function showDeleteView(Reserva $reserva)
    {
        return view('reservas.delete', compact('reserva'));
    }

}
