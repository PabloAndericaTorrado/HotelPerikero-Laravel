@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-4xl font-bold text-center mb-8">{{ $habitacion->tipo }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="relative overflow-hidden mb-4">
                    <img src="{{ asset('habitacion_images/habitacion_' . $habitacion->id . '.jpg') }}" alt="{{ $habitacion->tipo }}" class="w-full h-64 object-cover rounded">
                </div>
                <ul class="text-sm text-gray-600">
                    <li><strong>Precio:</strong> ${{ $habitacion->precio }}/Noche</li>
                    <li><strong>Características:</strong> {{ $habitacion->caracteristicas }}</li>
                    <li><strong>Disponibilidad:</strong> {{ $habitacion->disponibilidad ? 'Disponible' : 'No Disponible' }}</li>
                    <!-- Puedes agregar más detalles aquí -->
                </ul>
            </div>

            <div class="col-span-2 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Descripción</h2>
                <p class="text-gray-600">{{ $habitacion->descripcion }}</p>

                <h2 class="text-xl font-semibold mt-8 mb-4">Servicios Adicionales</h2>
                <ul class="list-disc pl-6 text-gray-600">
                    <li>Servicio de limpieza diario</li>
                    <li>Wifi de alta velocidad</li>
                    <li>TV por cable</li>
                    <li>Minibar surtido</li>
                    <li>Servicio de habitaciones las 24 horas</li>
                    <li>Gimnasio y spa de última generación</li>
                    <li>Conserjería personalizada</li>
                    <!-- Agrega más servicios aquí -->
                </ul>

                @if($habitacion->disponibilidad)
                    <button class="bg-primary text-white px-6 py-3 mt-6 rounded-full">Reservar Ahora</button>
                @else
                    <button class="bg-gray-400 text-white px-6 py-3 mt-6 rounded-full cursor-not-allowed" disabled>No Disponible</button>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <!-- Agrega tus estilos de Tailwind CSS aquí -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        /* Agrega estilos adicionales aquí */
        .bg-primary {
            background-color: #3490dc;
        }

        .bg-primary:hover {
            background-color: #2779bd;
        }
    </style>
@endpush

@push('scripts')
    <!-- Agrega tus scripts interactivos aquí -->
@endpush
