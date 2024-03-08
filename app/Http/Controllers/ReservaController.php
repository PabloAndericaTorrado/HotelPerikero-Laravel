<?php

// app/Http/Controllers/ReservaController.php

namespace App\Http\Controllers;

use App\Mail\ReservationConfirmed;
use App\Models\Habitacion;
use App\Models\Parking;
use App\Models\Reserva;
use App\Models\ReservaParking;
use App\Models\Servicio;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;


class ReservaController extends Controller
{


    public function create($id)
    {
        $habitacion = Habitacion::findOrFail($id);

        // Obtener las fechas reservadas para la habitación
        $fechasReservadas = $this->getFechasReservadas($id);
        $servicios = Servicio::all();
        $plazasParking = Parking::all();

        return view('reservas.create', compact('habitacion', 'fechasReservadas','servicios', 'plazasParking'));
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
            'precio_total' => 0, // Este valor se calculará después de agregar servicios
            'pagado' => false // Asumiendo que el pago no se realiza inmediatamente
        ]);

        // Asociar servicios seleccionados, si se eligieron
        if ($request->has('servicios') && is_array($request->input('servicios'))) {
            $servicios = [];
            foreach ($request->input('servicios') as $servicioId) {
                // Puedes ajustar la cantidad según tus necesidades, por ahora se asume 1
                $servicios[$servicioId] = ['cantidad' => 1];
            }
            $reserva->servicios()->attach($servicios);
        }

        // Calcular el precio total y actualizar la reserva
        // Asegúrate de que el método calculateTotalPrice esté definido y calcule correctamente el precio
        $reserva->precio_total = $reserva->calculateTotalPrice();

        $reserva->save();
        // Mail::to($reserva->usuario->email)->send(new ReservationConfirmed($reserva));

        if ($request->has('plaza_parking_id') && $request->input('plaza_parking_id') != '') {
            $plazaParkingId = $request->input('plaza_parking_id');
            $plazaParking = Parking::findOrFail($plazaParkingId);

            // Verifica que la plaza de parking esté disponible
            if ($plazaParking->disponible) {
                ReservaParking::create([
                    'matricula' => $request->input('matricula_parking', 'Sin matrícula'),
                    'fecha_inicio' => $checkIn,
                    'fecha_fin' => $checkOut,
                    'reserva_habitacion_id' => $reserva->id,
                    'parking_id' => $plazaParkingId,
                ]);

                // Marcar la plaza de parking como no disponible
                $plazaParking->save();
            } else {
                // Opcional: Manejar el caso en que la plaza seleccionada ya no esté disponible
                return redirect()->back()->with('error', 'La plaza de parking seleccionada ya no está disponible.');
            }
        }
        $reservaConParking = Reserva::with('reservaParking')->find($reserva->id);
        Mail::to($reservaConParking->usuario->email)->send(new ReservationConfirmed($reservaConParking));
        return redirect()->route('reservas.show', $reserva->id)->with('success', 'Reserva creada con éxito.');
    }


// Función para verificar la disponibilidad de la habitación
    protected function habitacionDisponible($habitacionId, $checkIn, $checkOut)
    {
        return !Reserva::where('habitacion_id', $habitacionId)
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out', [$checkIn, $checkOut])
                    ->orWhere(function ($query) use ($checkIn, $checkOut) {
                        $query->where('check_in', '<', $checkOut)
                            ->where('check_out', '>', $checkIn);
                    });
            })->exists();
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
        $plazasParking = Parking::all();
        return view('admins.create_reservation', compact('habitaciones', 'servicios', 'fechasReservadas', 'plazasParking'));
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
            'pagado' => false,
            'dni' => $request->dni,
        ]);

        // Asociar servicios seleccionados, si se eligieron
        if ($request->has('servicios') && is_array($request->input('servicios'))) {
            $servicios = [];
            foreach ($request->input('servicios') as $servicioId) {
                // Puedes ajustar la cantidad según tus necesidades, por ahora se asume 1
                $servicios[$servicioId] = ['cantidad' => 1];
            }
            $reserva->servicios()->attach($servicios);
        }

        // Calcular el precio total y actualizar la reserva
        // Asegúrate de que el método calculateTotalPrice esté definido y calcule correctamente el precio
        $reserva->precio_total = $reserva->calculateTotalPrice();
        $reserva->save();

        if ($request->has('plaza_parking_id') && $request->input('plaza_parking_id') != '') {
            $plazaParkingId = $request->input('plaza_parking_id');
            $plazaParking = Parking::findOrFail($plazaParkingId);

            if ($request->has('reservar_parking') && $request->input('plaza_parking_id')) {
                $plazaParkingId = $request->input('plaza_parking_id');
                $plazaParking = Parking::find($plazaParkingId);

                if ($plazaParking && $plazaParking->disponible) {
                    ReservaParking::create([
                        'matricula' => $request->input('matricula_parking', 'Sin matrícula'),
                        'fecha_inicio' => $checkIn,
                        'fecha_fin' => $checkOut,
                        'reserva_habitacion_id' => $reserva->id,
                        'parking_id' => $plazaParkingId,
                    ]);

                    // Marcar la plaza de parking como no disponible
                    $plazaParking->disponible = false;
                    $plazaParking->save();
                } else {
                    return redirect()->back()->with('error', 'La plaza de parking seleccionada ya no está disponible.');
                }
            }

        }

        return redirect()->route('admins.create_reservation')->with('success', 'Reserva creada con éxito');
    }


    public function getParkingReservations(Request $request)
    {
        $checkIn = $request->input('check_in');
        $checkOut = $request->input('check_out');

        // Busca las reservas de parking para las fechas especificadas
        $reservasParking = ReservaParking::whereBetween('fecha_inicio', [$checkIn, $checkOut])
            ->orWhereBetween('fecha_fin', [$checkIn, $checkOut])
            ->orWhere(function ($query) use ($checkIn, $checkOut) {
                $query->where('fecha_inicio', '<=', $checkIn)
                    ->where('fecha_fin', '>=', $checkOut);
            })
            ->pluck('parking_id');

        return response()->json($reservasParking);
    }


    public function generatePDF($id)
    {
        $reserva = Reserva::findOrFail($id);
        // Asumiendo que tu vista se llama 'pdf.detalles' y que pasas los datos de reserva
        $pdf = PDF::loadView('pdf.detalles', compact('reserva'));

        // Descargar el PDF con el nombre 'reserva-detalle.pdf'
        return $pdf->download('reserva-detalle.pdf');
    }


}
