@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-5xl font-extrabold text-center mb-12 text-blue-600">Descubre nuestras Habitaciones</h1>

        <div class="flex justify-end mb-6">
            <button id="toggleFilters" class="bg-blue-500 text-white px-4 py-2 rounded-md mr-4">Filtros</button>
        </div>

        <div id="filtersContainer" class="hidden mb-8">
            <form action="{{ route('habitaciones.filtrar') }}" method="POST" class="mb-8">
                @csrf <!-- Agrega el token CSRF para protección contra falsificación de solicitudes entre sitios -->
                <label for="capacidad" class="block mb-2">Selecciona la capacidad:</label>
                <select name="capacidad" id="capacidad" class="border border-gray-300 rounded-md p-2">
                    <option value="1">Selección</option>
                    <option value="1">1 Persona</option>
                    <option value="2">2 Personas</option>
                    <option value="3">3 Personas</option>
                    <option value="4">4 Personas</option>
                </select>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md ml-4">Filtrar</button>
            </form>
            <button id="removeFilters" class="border border-blue-500 text-blue-500 px-4 py-2 rounded-md hover:bg-blue-500 hover:text-white transition-colors duration-300">Quitar Filtros</button>


        </div>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($habitaciones as $habitacion)
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

            const toggleFiltersButton = document.getElementById('toggleFilters');
            const filtersContainer = document.getElementById('filtersContainer');
            const removeFiltersButton = document.getElementById('removeFilters');


            toggleFiltersButton.addEventListener('click', function() {
                filtersContainer.classList.toggle('hidden');
            });

            removeFiltersButton.addEventListener('click', function() {
                window.location.href = "{{ route('habitaciones.index') }}";
            });
        });
    </script>
@endsection
