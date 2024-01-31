{{-- resources/views/admins/today_reservations.blade.php --}}
@extends('admins.app')

@section('content')
    <style>
        .reservation-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .card-header, .card-footer {
            background-color: #f8f9fa;
            padding: 10px;
        }

        .card-body {
            padding: 15px;
        }
    </style>

    <div class="container">
        <h2>Reservas de hoy</h2>
        @if ($reservasHoy->isEmpty())
            <p>No hay reservas para hoy.</p>
        @else
            <div class="row">
                @foreach ($reservasHoy as $reserva)
                    <div class="col-md-4 mb-3">
                        <div class="reservation-card">
                            <div class="card-header">
                                <h3>Usuario</h3>
                            </div>
                            <div class="card-body">
                                @if ($reserva->usuario)
                                    <p>Nombre: {{ $reserva->usuario->name ?? 'No disponible' }} {{ $reserva->usuario->apellidos ?? 'No disponible' }}</p>
                                    <p>Email: {{ $reserva->usuario->email ?? 'No disponible' }}</p>
                                @else
                                    <p>Usuario no disponible</p>
                                @endif
                            </div>

                            <div class="card-header">
                                <h3>Habitación</h3>
                            </div>
                            <div class="card-body">
                                <p>Nombre: {{ $reserva->habitacion->nombre }}</p>
                                <p>Tipo: {{ $reserva->habitacion->tipo }}</p>
                                <p>Precio por noche: {{ $reserva->habitacion->precio }}</p>
                            </div>

                            <div class="card-header">
                                <h3>Reserva</h3>
                            </div>
                            <div class="card-body">
                                <p>Check-in: {{ $reserva->check_in }}</p>
                                <p>Check-out: {{ $reserva->check_out }}</p>
                                <p>Precio total: {{ $reserva->calculateTotalPrice() }}</p>
                                <p>Estancia Total: {{ $reserva->calculateTotalDays() }}/Noches</p>
                            </div>

                            <div class="card-footer">
                                {{-- Agrega un formulario para cancelar la reserva --}}
                                <form method="POST" action="{{ route('reservas.cancel', $reserva->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de cancelar esta reserva?')">Cancelar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
