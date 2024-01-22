@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col relative">
                <div class="relative overflow-hidden mb-4">
                    <img id="mainImage" src="{{ asset('habitacion_images/habitacion_' . $habitacion->id . '.jpg') }}"
                         alt="{{ $habitacion->tipo }}" class="w-full h-64 object-cover rounded">
                    <button onclick="changeImage('left')"
                            class="absolute inset-y-1/2 left-0 bg-gray-200 opacity-50 hover:opacity-75 px-2 focus:outline-none rounded-md text-gray-700 transform -translate-y-1/2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button onclick="changeImage('right')"
                            class="absolute inset-y-1/2 right-0 bg-gray-200 opacity-50 hover:opacity-75 px-2 focus:outline-none rounded-md text-gray-700 transform -translate-y-1/2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>

                <ul class="text-sm text-gray-600">
                    <li><strong>Tipo de habitación: </strong>{{ $habitacion->tipo }}</li>
                    <li><strong>Precio:</strong> ${{ $habitacion->precio }}/Noche</li>

                    <li>
                        <strong>Disponibilidad:</strong> {{ $habitacion->disponibilidad ? 'Disponible' : 'No Disponible' }}
                    </li>
                    <li>
                        @if($habitacion->disponibilidad === 1)
                            @auth
                                <br />
                                <a href="{{ route('reservas.create', $habitacion->id) }}" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-primary-dark transform transition duration-300 ease-in-out hover:scale-105 self-start mt-4">
                                    Reservar Ahora
                                </a>
                            @else
                                <form action="{{ route('login') }}" method="GET">
                                    <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-primary-dark transform transition duration-300 ease-in-out hover:scale-105 self-start mt-4">
                                        Inicia sesión para reservar
                                    </button>
                                </form>
                            @endauth
                        @endif
                    </li>
                </ul>
            </div>

            <div class="col-span-2 bg-white p-6 rounded-lg shadow-md">
                <div class="flex flex-col justify-center items-center"> <!-- Div para centrar el contenido -->
                    <h2 class="text-xl font-semibold mb-1">Descripción</h2>
                    <hr class="w-48 border-t-2 border-gray-300 my-2 mx-auto">
                    <p class="text-gray-600">{{ $habitacion->descripcion }}</p>

                    <h2 class="text-xl font-semibold mt-8 mb-lg-1">Servicios Adicionales</h2>
                    <hr class="w-48 border-t-2 border-gray-300 my-2 mx-auto">
                    <div class="grid grid-cols-2 lg:grid-cols-5 gap-4 justify-center">
                        @foreach($servicios as $index => $servicio)
                            <div class="flex flex-col items-center">
                                <img src="{{ asset('servicio_images/servicio_' . ($index + 1) . '.png') }}"
                                     class="w-16 h-16 object-cover rounded mx-6 my-6">
                            </div>
                        @endforeach
                    </div>

                    <a class="text-blue-500 hover:text-blue-700 font-semibold transition-colors duration-300"
                       href="{{ route('servicios.index') }}">Ver Tarifas</a>
                </div>
            </div>


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

        /* Ajustes de estilos para las miniaturas */
        #miniaturesContainer {
            transition-duration: 0.5s;
            transition-timing-function: cubic-bezier(0.1, 0.7, 1.0, 0.1);
        }
    </style>
@endpush

@push('scripts')
    <script>
        let currentImageIndex = 1;
        const totalImages = 4;

        function changeImage(direction) {
            const habitacionID = '{{ $habitacion->id }}';
            if (direction === 'left') {
                currentImageIndex = currentImageIndex === 1 ? totalImages : currentImageIndex - 1;
            } else if (direction === 'right') {
                currentImageIndex = currentImageIndex === totalImages ? 1 : currentImageIndex + 1;
            }

            const imageName = currentImageIndex === 1 ? `habitacion_${habitacionID}.jpg` : `habitacion_${habitacionID}_${currentImageIndex - 1}.jpg`;
            document.getElementById('mainImage').src = `{{ asset('habitacion_images/') }}/${imageName}`;
        }
    </script>
@endpush
