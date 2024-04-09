@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-5xl font-extrabold text-center mb-12 text-blue-600">Descubre nuestras Salas de Eventos</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($espacios as $espacio)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-all duration-500 hover:shadow-2xl" style="opacity: 0;" data-habitacion>
                    <div class="relative mb-4">
                        <img src="{{ asset('espacio_images/espacio_' . $loop->iteration . '.jpg') }}" alt="Espacio {{ $loop->iteration }}" class="w-full h-64 object-cover hover:opacity-95">
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-50">
                            <a href="{{ route('espacios.show', $espacio->id) }}" class="text-white px-4 py-2 rounded-lg border border-white hover:bg-white hover:text-blue-700 transition-colors duration-300">Ver Detalles</a>
                        </div>
                    </div>
                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-2">Capacidad Máxima: {{ $espacio->capacidad_maxima }}</h2>
                        <p class="text-gray-600 mb-4">{{ $espacio->descripcion }}</p>
                        <ul class="text-sm text-gray-600">
                            <li><strong>Precio:</strong> ${{ $espacio->precio }}/Hora</li>
                            <li><strong>Disponibilidad:</strong> {{ $espacio->disponibilidad ? 'Disponible' : 'No Disponible' }}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const habitaciones = document.querySelectorAll('[data-habitacion]');
            habitaciones.forEach((habitacion, index) => {
                setTimeout(() => {
                    habitacion.style.opacity = 1;
                }, 150 * index);
            });
        });
    </script>
@endsection

