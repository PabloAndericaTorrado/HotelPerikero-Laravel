@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
            <h1 class="text-3xl font-semibold mb-6">Reserva Exitosa</h1>

            <p>¡Tu reserva se ha realizado con éxito! Aquí están algunos detalles de tu reserva:</p>

            <!-- Muestra los detalles de la reserva -->
            <ul>
                <li><strong>ID de Reserva:</strong> {{ $reserva->id }}</li>
                <li><strong>Habitación:</strong> {{ $reserva->habitacion->tipo }}</li>
                <li><strong>Fecha de Check-in:</strong> {{ $reserva->check_in}}</li>
                <li><strong>Fecha de Check-out:</strong> {{ $reserva->check_out}}</li>
                <li><strong>Precio Total:</strong> ${{ number_format($reserva->precio_total, 2) }}</li>
            </ul>

            <div class="mt-6">
                <!-- Botón para volver a habitaciones.index -->
                <a href="{{ route('habitaciones.index') }}" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-700">
                    Volver a Habitaciones
                </a>
            </div>
        </div>
    </div>
@endsection
