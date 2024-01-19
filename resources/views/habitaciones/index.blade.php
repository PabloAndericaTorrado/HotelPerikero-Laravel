@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-4xl font-bold text-center mb-8">Descubre nuestras Habitaciones</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($habitaciones as $habitacion)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="relative overflow-hidden mb-4">
                        <img src="{{ asset('habitacion_images/habitacion_' . $loop->iteration . '.jpg') }}" alt="Habitación {{ $loop->iteration }}" class="w-full h-48 object-cover rounded">
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 transition duration-300">
                            <a href="{{ route('habitaciones.show', $habitacion->id) }}" class="bg-primary text-white px-4 py-2 rounded">Ver Detalles</a>
                        </div>
                    </div>
                    <h2 class="text-xl font-semibold mb-2">{{ $habitacion->tipo }}</h2>
                    <p class="text-gray-600 mb-4">{{ $habitacion->descripcion }}</p>
                    <ul class="text-sm text-gray-600">
                        <li><strong>Precio:</strong> ${{ $habitacion->precio }}/Noche</li>
                        <li><strong>Disponibilidad:</strong> {{ $habitacion->disponibilidad ? 'Disponible' : 'No Disponible' }}</li>
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        .bg-primary {
            background-color: #3490dc;
        }

        .bg-primary:hover {
            background-color: #2779bd;
        }
    </style>
@endpush

@push('scripts')
    <!-- Scripts específicos para la vista de habitaciones -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({
                duration: 1000,
                once: true,
            });
        });
    </script>
@endpush
