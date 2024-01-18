@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded shadow-lg">
            <h1 class="text-4xl font-semibold mb-8">Mi Perfil</h1>

            <div class="mb-10">
                <h2 class="text-2xl font-semibold mb-4">Información Personal</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-600"><strong>Nombre:</strong> {{ auth()->user()->name }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600"><strong>Email:</strong> {{ auth()->user()->email }}</p>
                    </div>
                </div>
            </div>

            <div>
                <h2 class="text-2xl font-semibold mb-4">Reservas</h2>
                @if(count(auth()->user()->reservas) > 0)
                    <ul class="space-y-4">
                        @foreach(auth()->user()->reservas as $reserva)
                            <li class="border p-4 rounded">
                                <div class="flex justify-between items-center">
                                    <p class="text-lg font-semibold">{{ $reserva->habitacion->tipo }} - Habitación {{ $reserva->habitacion->numero }}</p>
                                    <p class="text-gray-600">{{ $reserva->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                                    <div>
                                        <p><strong>Check-in:</strong> {{ $reserva->check_in }}</p>
                                        <p><strong>Check-out:</strong> {{ $reserva->check_out }}</p>
                                    </div>
                                    <div>
                                        <p><strong>Precio Noche:</strong> ${{ $reserva->habitacion->precio }}</p>
                                        <p><strong>Precio Total:</strong> ${{ number_format($reserva->calculateTotalPrice(), 2) }}</p>
                                        <p><strong>Noches:</strong> {{ $reserva->calculateTotalDays() }} Noches</p>
                                        <p><strong>Pagado:</strong> {{ $reserva->pagado ? 'Sí' : 'No' }}</p>
                                        <form action="{{ route('reservas.delete.view', $reserva->id) }}" method="get">
                                            @csrf
                                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 active:bg-red-700 focus:outline-none focus:border-red-800 focus:ring focus:ring-red-300 disabled:opacity-25 transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                                Cancelar Reserva
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-600">No tienes reservas.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
