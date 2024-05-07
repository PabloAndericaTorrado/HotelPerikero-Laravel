@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-5xl font-extrabold text-center mb-12 text-blue-600">Descubre nuestras Habitaciones</h1>

        <div class="flex justify-end mb-6">
            <button id="toggleFilters" class="bg-blue-500 text-white px-4 py-2 rounded-md mr-4">Filtros</button>
        </div>

        <div id="filtersContainer" class="hidden mb-8 flex flex-wrap justify-between items-center">
            <form action="{{ route('habitaciones.filtrar') }}" method="POST" class="mb-8 flex items-center">
                @csrf
                <!-- Agrega el token CSRF para protección contra falsificación de solicitudes entre sitios -->

                <label for="capacidad" class="block mb-2 mr-4">Capacidad:</label>
                <select name="capacidad" id="capacidad" class="border border-gray-300 rounded-md p-2 mr-4">
                    <option value="1">1 Persona</option>
                    <option value="2">2 Personas</option>
                    <option value="3">3 Personas</option>
                    <option value="4">4 Personas</option>
                </select>

                <label for="vistas" class="block mb-2 mr-4">Vistas:</label>
                <select name="vistas" id="vistas" class="border border-gray-300 rounded-md p-2 mr-4">
                    <option value="">Cualquier vista</option>
                    <option value="vista_mar">Vista al Mar</option>
                    <option value="vista_interior">Vista Interior</option>
                    <option value="vista_ciudad">Vista a la Ciudad</option>
                </select>

                <label for="balcon" class="block mb-2 mr-4">Tipo de balcón:</label>
                <select name="balcon" id="balcon" class="border border-gray-300 rounded-md p-2 mr-4">
                    <option value="">Cualquier tipo</option>
                    <option value="balcon_privado">Balcón Privado</option>
                    <option value="balcon_compartido">Balcón Compartido</option>
                </select>

                <div class="flex items-center mr-4">
                    <input type="checkbox" name="mascotas" id="mascotas" value="1" class="mr-2">
                    <label for="mascotas">¿Mascotas?</label>
                </div>

                <div class="flex items-center mr-4">
                    <input type="checkbox" name="fumadores" id="fumadores" value="1" class="mr-2">
                    <label for="fumadores">¿Fumadores?</label>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-4">Filtrar</button>
            </form>
            <button id="removeFilters" class="border border-blue-500 text-blue-500 px-4 py-2 rounded-md hover:bg-blue-500 hover:text-white transition-colors duration-300 mt-4">Quitar Filtros</button>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($habitaciones as $habitacion)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-all duration-500 hover:shadow-lg" style="opacity: 0;" data-habitacion>
                    <div class="relative mb-4">
                        <img src="{{ asset('habitacion_images/habitacion_' . (($habitacion->id - 1) % 10 + 1) . '.jpg') }}" alt="Habitación {{ $habitacion->id }}" class="w-full h-64 object-cover">
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
        <div class="mt-8">
            {{ $habitaciones->links('vendor.pagination.tailwind') }}
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
