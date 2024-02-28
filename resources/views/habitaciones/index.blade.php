@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-4xl font-bold text-center mb-8">Descubre nuestras Habitaciones</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($habitaciones as $habitacion)
                <div class="bg-white p-6 rounded-lg shadow-md opacity-0 transition-opacity duration-500" data-habitacion>
                    <div class="relative overflow-hidden mb-4">
                        <img src="{{ asset('habitacion_images/habitacion_' . $loop->iteration . '.jpg') }}" alt="Habitación {{ $loop->iteration }}" class="w-full h-48 object-cover rounded">
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 transition duration-300 bg-black bg-opacity-50">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const habitaciones = document.querySelectorAll('[data-habitacion]');
            let delay = 0;

            habitaciones.forEach(habitacion => {
                setTimeout(() => habitacion.classList.add('opacity-100'), delay);
                delay += 150;
            });
        });
    </script>
@endsection
