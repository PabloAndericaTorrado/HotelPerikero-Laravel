@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow">
            <h1 class="text-3xl font-semibold mb-6 text-center text-gray-800">Confirmar Eliminación de Reserva</h1>

            <p class="text-gray-600 mb-4">¿Estás seguro de que deseas cancelar la siguiente reserva?</p>

            <div class="bg-gray-100 p-4 rounded-lg">
                <ul class="list-disc list-inside space-y-2">
                    <li><strong>ID de Reserva:</strong> <span class="text-gray-700">{{ $reserva->id }}</span></li>
                    <li><strong>Habitación:</strong> <span class="text-gray-700">{{ $reserva->habitacion->tipo }}</span></li>
                    <li><strong>Fecha de Check-in:</strong> <span class="text-gray-700">{{ $reserva->check_in }}</span></li>
                    <li><strong>Fecha de Check-out:</strong> <span class="text-gray-700">{{ $reserva->check_out }}</span></li>
                    <li><strong>Precio Total:</strong> <span class="text-gray-700">${{ number_format($reserva->precio_total, 2) }}</span></li>
                </ul>
            </div>

            <form action="{{ route('reservas.delete', $reserva->id) }}" method="post" class="mt-6">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-800 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Confirmar Cancelación
                </button>
            </form>
        </div>
    </div>
@endsection
