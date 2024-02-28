@extends('layouts.app')

@section('content')

    <div class="container mx-auto mt-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-xl">
            <h1 class="text-4xl font-semibold mb-6 text-center text-blue-600">Reserva Exitosa 🎉</h1>

            <p class="text-lg text-gray-700 mb-4">¡Tu reserva se ha realizado con éxito! Aquí están algunos detalles de tu reserva:</p>

            <!-- Muestra los detalles de la reserva con estilos mejorados -->
            <div class="bg-blue-100 p-5 rounded-md shadow-md">
                <ul class="list-none space-y-2">
                    <li class="text-md text-gray-700"><strong>ID de Reserva:</strong> <span class="text-blue-500">{{ $reserva->id }}</span></li>
                    <li class="text-md text-gray-700"><strong>Habitación:</strong> <span class="text-blue-500">{{ $reserva->habitacion->tipo }}</span></li>
                    <li class="text-md text-gray-700"><strong>Fecha de Check-in:</strong> <span class="text-blue-500">{{ $reserva->check_in }}</span></li>
                    <li class="text-md text-gray-700"><strong>Fecha de Check-out:</strong> <span class="text-blue-500">{{ $reserva->check_out }}</span></li>
                    <li class="text-md text-gray-700"><strong>Precio Total:</strong> <span class="text-green-500">$ {{ number_format($reserva->precio_total, 2) }}</span></li>
                </ul>
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('habitaciones.index') }}" class="inline-block bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold text-lg hover:bg-blue-700 transition duration-300 ease-in-out transform hover:-translate-y-1 shadow-lg">
                    Volver a Habitaciones
                </a>
            </div>
        </div>
    </div>
@endsection
