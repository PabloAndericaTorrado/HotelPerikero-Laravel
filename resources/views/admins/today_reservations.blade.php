{{-- resources/views/admins/today_reservations.blade.php --}}
@extends('admins.app')

@section('content')
    <style>
        .btn-confirmar {
            background-color: #28a745; /* Verde */
            color: #fff;
            border: none;
            padding: 0.375rem 0.75rem;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        .reservation-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
            max-width: 600px; /* Ajusta el ancho máximo de la tarjeta según tus necesidades */
            margin: auto; /* Centra la tarjeta */
        }

        .card-header, .card-footer {
            background-color: #f8f9fa;
            padding: 10px;
        }

        .card-body {
            padding: 15px;
        }

        .card-img {
            width: 100%;
            height: 350px; /* Ajusta la altura de la imagen según tus necesidades */
            object-fit: cover;
            border-radius: 8px 8px 0 0;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .card-subtitle {
            font-size: 1rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }

        .card-text {
            margin-bottom: 1rem;
        }

        .btn-cancelar {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 0.375rem 0.75rem;
            border-radius: 0.25rem;
            cursor: pointer;
        }
    </style>

    <div class="container">
        <h1 class="text-center mb-4">Reservas de hoy:</h1>
        @if ($reservasHoy->isEmpty())
            <p class="text-center">No hay reservas para hoy.</p>
        @else
            <div class="row justify-content-center">
                @foreach ($reservasHoy as $reserva)
                    <div class="col-md-4 mb-3">
                        <div class="reservation-card">
                            <img src="{{ asset('habitacion_images/habitacion_' . $reserva->habitacion->id . '.jpg') }}" alt="Habitación" class="card-img">

                            <div class="card-header">
                                <h3 class="card-title">{{ $reserva->habitacion->tipo }}</h3>
                                <p class="card-subtitle">Habitación {{ $reserva->habitacion->numero }}</p>
                            </div>

                            <div class="card-body">
                                <div class="grid grid-cols-2 gap-4 mb-4">
                                    <div class="flex justify-center items-center border-b pb-4">
                                        <p><strong>Entrada:</strong> {{ $reserva->check_in }}</p>
                                    </div>
                                    <div class="flex justify-center items-center border-b pb-4">
                                        <p><strong>Salida:</strong> {{ $reserva->check_out }}</p>
                                    </div>
                                </div>

                                <div class="bg-gray-100 p-4 rounded mb-4">
                                    <div class="flex flex-col space-y-4">
                                        <div>
                                            <p class="text-lg font-semibold mb-2 text-blue-500">Detalles del Cliente</p>
                                            @if ($reserva->usuario->email === 'admin@admin.com')
                                            <p><strong>Reserva Hecha por Telefono:</strong></p>
                                                <p><strong>DNI:</strong> {{ $reserva->dni }}</p>
                                            @else
                                            <p><strong>Nombre:</strong> {{ $reserva->usuario->name }} {{ $reserva->usuario->apellidos }}</p>
                                            <p><strong>Email:</strong> {{ $reserva->usuario->email }}</p>
                                            <p><strong>Telefono:</strong> {{ $reserva->usuario->telefono}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-100 p-4 rounded mb-4">
                                    <div class="flex flex-col space-y-4">
                                        <div>
                                            <p class="text-lg font-semibold mb-2 text-red-500">Detalles de la Reserva</p>
                                            <p><strong>Precio por noche:</strong> ${{ $reserva->habitacion->precio }}</p>
                                            <p><strong>Estancia total:</strong> {{ $reserva->calculateTotalDays() }} noches</p>
                                            <p><strong>Pagado:</strong> {{ $reserva->pagado ? 'Sí' : 'No' }}</p>
                                            <p><strong>Servicios Adicionales:</strong></p>
                                            @if(count($reserva->servicios) > 0)
                                                <ul>
                                                    @foreach($reserva->servicios as $servicio)
                                                        <li>{{ $servicio->nombre }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p>No se han seleccionado servicios adicionales.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-4">
                                @unless ($reserva->confirmado)
                                    <div class="flex justify-center items-center">
                                        <form method="POST" action="{{ route('reservas.cancel', $reserva->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn-cancelar" onclick="return confirm('¿Estás seguro de cancelar esta reserva?')">Cancelar Reserva</button>
                                        </form>
                                    </div>
                                    <div class="flex justify-center items-center">
                                        <form method="POST" action="{{ route('reservas.confirm', $reserva->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn-confirmar" onclick="return confirm('¿Estás seguro de confirmar esta reserva?')">Confirmar Reserva</button>
                                        </form>
                                    </div>
                                @else
                                    <div class="flex justify-center">
                                        <p class="text-green-500 font-bold text-center">Reserva Confirmada Con Éxito</p>
                                    </div>

                                @endunless
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
