@extends('layouts.app')

@section('content')

    <main class="container mx-auto px-4 py-8">
        <section class="max-w-7xl mx-auto bg-gradient-to-r from-blue-50 to-blue-100 p-8 rounded-xl shadow-2xl">
            <header class="mb-12 text-center">
                <h1 class="text-6xl font-extrabold mb-4 text-blue-600">¡Reserva Confirmada!</h1>
                <p class="text-2xl font-semibold text-gray-800">Los detalles de tu reserva han sido enviados a tu correo electrónico.</p>
            </header>

            <div class="flex flex-col lg:flex-row gap-10 items-center">
                <!-- Imagen de la habitación con efecto hover -->
                <div class="lg:flex-1 hover:scale-105 transition-transform duration-300 ease-in-out">
                    <img src="{{ asset('habitacion_images/habitacion_' . $reserva->habitacion->id . '.jpg') }}" alt="Habitación {{ $reserva->habitacion->tipo }}" class="rounded-xl shadow-xl w-full h-full object-cover transform">
                </div>

                <!-- Detalles de la reserva con gradientes y efectos de sombra -->
                <div class="lg:flex-1 bg-gradient-to-tl from-blue-200 via-blue-100 to-white p-8 rounded-xl shadow-xl">
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">Detalles de la Reserva</h2>
                    <ul class="space-y-4">
                        <li class="flex items-center text-xl text-gray-700">
                            <svg class="w-8 h-8 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 10h10M7 14h10m-9 4h8M5 6h8m-6 4v8m4-8v8" />
                            </svg>
                            <span><strong>ID de Reserva:</strong> {{ $reserva->id }}</span>
                        </li>
                        <li class="flex items-center text-xl text-gray-700">
                            <svg class="w-8 h-8 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a1 1 0 001 1h16a1 1 0 001-1V7a1 1 0 00-1-1h-4a1 1 0 01-1-.883V4a2 2 0 00-4 0v1.117A1 1 0 0111 5H5a1 1 0 00-1 1zM9 10h6v8H9V10z" /></svg>
                            <span><strong>Habitación:</strong> {{ $reserva->habitacion->tipo }}</span>
                        </li>
                        <li class="flex items-center text-xl text-gray-700">
                            <svg class="w-8 h-8 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M3 21h18a2 2 0 002-2V7a2 2 0 00-2-2H3a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            <span><strong>Fecha de check-in:</strong> {{ $reserva->check_in }}</span>
                        </li>
                        <li class="flex items-center text-xl text-gray-700">
                            <svg class="w-8 h-8 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M3 21h18a2 2 0 002-2V7a2 2 0 00-2-2H3a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            <span><strong>Fecha de check-out:</strong> {{ $reserva->check_out }}</span>
                        </li>
                        <li class="flex items-center text-xl text-gray-700">
                            <svg class="w-8 h-8 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-2.28 0-4 1.79-4 4s1.72 4 4 4 4-1.79 4-4-1.72-4-4-4zm0 10c-3.31 0-6-2.69-6-6s2.69-6 6-6 6 2.69 6 6-2.69 6-6 6zm0-14a9 9 0 100 18 9 9 0 000-18z" /></svg>
                            <span><strong>Precio total:</strong> ${{ number_format($reserva->precio_total, 2) }}</span>
                        </li>
                    </ul>
                    <div class="mt-8">
                        <a href="{{ route('habitaciones.index') }}" class="inline-flex items-center justify-center bg-blue-500 text-white px-6 py-3 rounded-lg font-bold text-xl hover:bg-blue-700 transition duration-300 ease-in-out transform hover:-translate-y-1 shadow-lg mr-4">
                            Volver a Habitaciones
                        </a>
                        <a href="{{ route('reserva.pdf', ['id' => $reserva->id]) }}" class="inline-flex items-center justify-center bg-red-500 text-white px-6 py-3 rounded-lg font-bold text-xl hover:bg-red-700 transition duration-300 ease-in-out transform hover:-translate-y-1 shadow-lg">
                            Descargar PDF
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
