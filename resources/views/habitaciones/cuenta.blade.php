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
