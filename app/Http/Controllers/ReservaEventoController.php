<?php

namespace App\Http\Controllers;

use App\Models\Espacio;
use App\Models\ReservaEvento;
use App\Models\ServicioEvento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaEventoController extends Controller
{
    // Mostrar una lista de todas las reservas
    public function index()
    {
        $reservas = ReservaEvento::with(['usuario', 'espacio', 'servicios'])->get();
        return view('reserva_eventos.index', compact('reservas'));
    }

    public function create($id)
    {
        $espacio = Espacio::findOrFail($id);
        $servicios = ServicioEvento::all();
        $fechasReservadas = $this->getFechasReservadas($id);
        return view('reserva_eventos.create', compact('espacio', 'servicios', 'fechasReservadas'));
    }

    protected function getFechasReservadas($espacioId)
    {
        $reservas = ReservaEvento::where('espacio_id', $espacioId)->get();

        $fechasReservadas = [];
        foreach ($reservas as $reserva) {
            $fechasReservadas[] = [
                'from' => $reserva->check_in,
                'to' => $reserva->check_out,
            ];
        }

        return $fechasReservadas;
    }


    // Guardar la nueva reserva en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'espacio_id' => 'required|exists:espacios,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'cantidad_personas' => 'required|integer|min:1',
            'servicios' => 'nullable|array',
            'servicios.*' => 'exists:servicio_eventos,id',
        ]);

        $espacioId = $request->input('espacio_id');
        $checkIn = $request->input('fecha_inicio');
        $checkOut = $request->input('fecha_fin');

        if (!$this->espacioDisponible($espacioId, $checkIn, $checkOut)) {
            return back()->withErrors(['error' => 'El espacio no está disponible para las fechas seleccionadas.']);
        }

        $serviciosSeleccionados = $request->input('servicios', []);
        $precioTotal = $this->calcularPrecioTotal($espacioId, $serviciosSeleccionados, $checkIn, $checkOut);

        $reserva = new ReservaEvento([
            'users_id' => Auth::id(),
            'espacio_id' => $espacioId,
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'precio_total' => $precioTotal,
            'pagado' => true,
            'cantidad_personas' => $request->input('cantidad_personas'),
        ]);
        $reserva->save();

        foreach ($serviciosSeleccionados as $servicioId) {
            $servicio = ServicioEvento::find($servicioId);
            if ($servicio) {
                $reserva->servicios()->attach($servicioId, ['precio' => $servicio->precio]);
            }
        }

        return redirect()->route('reserva_eventos.index')->with('success', 'Reserva creada con éxito.');
    }


    protected function calcularPrecioTotal($espacioId, $serviciosSeleccionados, $fechaInicio, $fechaFin)
    {
        // Obtener el precio base del espacio
        $espacio = Espacio::findOrFail($espacioId);
        $precioBaseEspacio = $espacio->precio; // Asume que tienes una columna 'precio' en tu tabla de espacios

        // Calcular la duración del evento en horas (podría ajustarse a tus necesidades específicas)
        $inicio = \Carbon\Carbon::parse($fechaInicio);
        $fin = \Carbon\Carbon::parse($fechaFin);
        $duracionEnHoras = $inicio->diffInHours($fin);

        // Asumir un costo por hora si tu lógica de negocio lo requiere
        // Si el precio base del espacio es por evento, no necesitas calcular por hora
        $precioTotalEspacio = $precioBaseEspacio * $duracionEnHoras;

        // Calcular el precio total de los servicios seleccionados
        $precioTotalServicios = 0;
        foreach ($serviciosSeleccionados as $servicioId) {
            $servicio = ServicioEvento::find($servicioId);
            if ($servicio) {
                $precioTotalServicios += $servicio->precio; // Asume que tienes una columna 'precio' en tu tabla de servicios
            }
        }

        // Sumar el precio del espacio y los servicios para obtener el precio total
        $precioTotal = $precioTotalEspacio + $precioTotalServicios;

        return $precioTotal;
    }

    protected function espacioDisponible($espacioId, $checkIn, $checkOut)
    {
        // Asegúrate de que checkIn y checkOut son instancias de Carbon
        $checkIn = \Carbon\Carbon::parse($checkIn);
        $checkOut = \Carbon\Carbon::parse($checkOut);

        return !ReservaEvento::where('espacio_id', $espacioId)
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->where(function ($query) use ($checkIn, $checkOut) {
                    $query->where('check_in', '<=', $checkOut)
                        ->where('check_out', '>=', $checkIn);
                });
            })->exists();
    }

    // Mostrar una reserva específica
    public function show($id)
    {
        $reserva = ReservaEvento::with('espacio')->findOrFail($id);
        return view('reserva_eventos.show', compact('reserva'));
    }

    // Mostrar un formulario para editar una reserva existente
    public function edit($id)
    {
        $reserva = ReservaEvento::findOrFail($id);
        $espacios = Espacio::all();
        return view('reserva_eventos.edit', compact('reserva', 'espacios'));
    }

    // Actualizar la reserva en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'espacio_id' => 'required|exists:espacios,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'precio_total' => 'required|numeric',
            'pagado' => 'required|boolean',
        ]);

        $reserva = ReservaEvento::findOrFail($id);
        $reserva->update($request->all());

        return redirect()->route('reserva_eventos.index')->with('success', 'Reserva actualizada con éxito.');
    }

    // Eliminar una reserva de la base de datos
    public function destroy($id)
    {
        $reservaEvento = ReservaEvento::findOrFail($id);
        // Asegúrate de implementar alguna lógica de autorización aquí para verificar que el usuario tiene permiso para eliminar esta reserva.
        $reservaEvento->delete();

        return redirect()->route('espacios.index')->with('success', 'Reserva eliminada con éxito.');
    }

}
