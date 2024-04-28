@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-5xl font-extrabold text-center mb-12 text-blue-600">Habitaciones Filtradas</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($habitacionesFiltradas as $habitacion)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-all duration-500 hover:shadow-lg" style="opacity: 0;" data-habitacion>
                    <div class="relative mb-4">
                        <img src="{{ asset('habitacion_images/habitacion_' . $loop->iteration . '.jpg') }}" alt="Habitación {{ $loop->iteration }}" class="w-full h-64 object-cover">
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-50">
                            <a href="{{ route('habitaciones.show', $habitacion->id) }}" class="text-white px-4 py-2 rounded-lg border border-white hover:bg-white hover:text-blue-700 transition-colors duration-300">Ver Detalles</a>
                        </div>
                    </div>
                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-2">{{ $habitacion->tipo }}</h2>
                        <p class="text-gray-600 mb-4">{{ $habitacion->descripcion }}</p>
                        <ul class="text-sm text-gray-600">
                            <li><strong>Precio:</strong> ${{ $habitacion->precio }}/Noche</li>
                            <li><strong>Disponibilidad:</strong> {{ $habitacion->disponibilidad ? 'Disponible' : 'No Disponible' }}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const habitaciones = document.querySelectorAll('[data-habitacion]');
            habitaciones.forEach((habitacion, index) => {
                setTimeout(() => {
                    habitacion.style.opacity = 1;
                }, 150 * index);
            });
        });
    </script>
@endsection
