<!-- resources/views/reservas/delete.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
            <h1 class="text-3xl font-semibold mb-6">Confirmar Eliminación de Reserva</h1>

            <p>¿Estás seguro de que deseas cancelar la siguiente reserva?</p>

            <ul>
                <li><strong>ID de Reserva:</strong> {{ $reserva->id }}</li>
                <li><strong>Habitación:</strong> {{ $reserva->habitacion->tipo }}</li>
                <li><strong>Fecha de Check-in:</strong> {{ $reserva->check_in }}</li>
                <li><strong>Fecha de Check-out:</strong> {{ $reserva->check_out }}</li>
                <li><strong>Precio Total:</strong> ${{ number_format($reserva->precio_total, 2) }}</li>
            </ul>

            <form action="{{ route('reservas.delete', $reserva->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 active:bg-red-700 focus:outline-none focus:border-red-800 focus:ring focus:ring-red-300 disabled:opacity-25 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Confirmar Cancelación
                </button>
            </form>
        </div>
    </div>
@endsection
