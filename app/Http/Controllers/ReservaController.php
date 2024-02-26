<?php

// app/Http/Controllers/ReservaController.php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use App\Models\Parking;
use App\Models\ReservaParking;
use App\Models\Servicio;
use App\Models\User;
use Carbon\Carbon;
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
        $reserva->precio_total = $reserva->calculateTotalPrice(); // Asegúrate de que este método esté definido correctamente

        if ($request->has('reservar_parking')) {
            // Encuentra una plaza de parking disponible que no esté reservada en las fechas seleccionadas
            $plazaParking = Parking::whereDoesntHave('reservas', function ($query) use ($checkIn, $checkOut) {
                $query->where(function ($query) use ($checkIn, $checkOut) {
                    $query->whereBetween('fecha_inicio', [$checkIn, $checkOut])
                        ->orWhereBetween('fecha_fin', [$checkIn, $checkOut])
                        ->orWhere(function ($query) use ($checkIn, $checkOut) {
                            $query->where('fecha_inicio', '<', $checkIn)
                                ->where('fecha_fin', '>', $checkOut);
                        });
                });
            })->where('disponible', true)->first();

            if ($plazaParking) {
                ReservaParking::create([
                    'matricula' => $request->input('matricula_parking', 'Sin matrícula'),
                    'fecha_inicio' => $checkIn,
                    'fecha_fin' => $checkOut,
                    'reserva_habitacion_id' => $reserva->id,
                    'parking_id' => $plazaParking->id,
                ]);

                // Marcar la plaza de parking como no disponible
                $plazaParking->disponible = false;
                $plazaParking->save();
            } else {
                return redirect()->back()->with('error', 'No hay plazas de estacionamiento disponibles.');
            }
        }

        return redirect()->route('reservas.show', $reserva->id)->with('success', 'Reserva creada con éxito.');
    }

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

    public function todayReservations()
    {
        $today = Carbon::now()->format('Y-m-d'); // Obtiene la fecha actual

        // Obtén todas las reservas para el día actual
        $reservasHoy = Reserva::whereDate('check_in', $today)->get();

        return view('admins.today_reservations', compact('reservasHoy'));
    }

    public function cancelReservation(Reserva $reserva)
    {
        $this->destroy($reserva);
        return redirect()->route('admins.today_reservations')->with('success', 'Reserva cancelada con éxito');
    }

    public function confirmarReserva(Reserva $reserva)
    {
        try {
            $reserva->update(['confirmado' => true]);

            return redirect()->route('admins.today_reservations')->with('success', 'Reserva confirmada con éxito');
        } catch (QueryException $e) {
            Log::error('Error al confirmar reserva: ' . $e->getMessage());

            return redirect()->route('admins.today_reservations')->with('error', 'Ocurrió un error al confirmar la reserva');
        }
    }
    public function createReservationForm()
    {
        $habitaciones = Habitacion::all();
        $servicios = Servicio::all();
        // Obtén las fechas reservadas para la primera habitación por defecto, ajusta según tu lógica
        $fechasReservadas = $this->getFechasReservadas($habitaciones->first()->id);

        return view('admins.create_reservation', compact('habitaciones', 'servicios', 'fechasReservadas'));
    }

    public function store2(Request $request)
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
            'pagado' => true,
            'dni' => $request->dni,

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
        return redirect()->route('admins.create_reservation')->with('success', 'Reserva creada con éxito');    }


}
