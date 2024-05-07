@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <div class="flex flex-col lg:flex-row lg:items-stretch">
            <div class="flex-1">
                <div class="bg-transparent shadow-lg rounded-lg overflow-hidden">
                    <img id="mainImage" src="{{ asset('habitacion_images/habitacion_' . (($habitacion->id - 1) % 10 + 1) . '.jpg') }}" alt="{{ $habitacion->tipo }}" class="w-full h-full object-cover transition duration-500 hover:scale-105">
                </div>
            </div>

            <!-- Contenedor de detalles de la habitación con ajustes para igualar la altura -->
            <div class="flex-1 mt-6 lg:mt-0 lg:ml-6">
                <div class="bg-white shadow-lg rounded-lg p-6 h-full">
                    <h2 class="text-2xl font-semibold mb-4">Detalles de la Habitación</h2>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">{{ $habitacion->tipo }}</h3>
                    <p class="text-gray-600 mb-4">{{ $habitacion->descripcion }}</p>
                    <div class="text-lg mb-4"><strong>Precio por noche:</strong> ${{ $habitacion->precio }}</div>
                    @if($habitacion->disponibilidad)
                        @auth
                            <br/>
                            <a href="{{ route('reservas.create', $habitacion->id) }}"
                               class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-primary-dark transform transition duration-300 ease-in-out hover:scale-105 self-start mt-4">
                                Reservar Ahora
                            </a>

                        @else
                            <form action="{{ route('login') }}" method="GET">
                                <button type="submit"
                                        class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-primary-dark transform transition duration-300 ease-in-out hover:scale-105 self-start mt-4">
                                    Inicia sesión para reservar
                                </button>
                            </form>
                        @endauth
                    @endif
                </div>
            </div>
        </div>

        <!-- Servicios adicionales-->
        <div class="mt-12 relative overflow-hidden">
            <h2 class="text-3xl font-semibold mb-6">Servicios Adicionales</h2>
            <div class="services-carousel">
                @foreach($servicios as $servicio)
                    <div class="service-card bg-white rounded-lg shadow-lg p-6 transform transition duration-500 hover:scale-105 hover:shadow-2xl">
                        <h3 class="text-lg font-semibold mb-2">{{ $servicio->nombre }}</h3>
                        <img src="{{ asset('servicio_images/servicio_' . $servicio->id . '.jpg') }}" alt="{{ $servicio->nombre }}" class="w-full h-48 object-cover rounded-lg mb-4">
                    </div>
                @endforeach
            </div>
            <button id="scrollLeft" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white shadow-lg rounded-full p-2 focus:outline-none">
                🡨
            </button>
            <button id="scrollRight" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white shadow-lg rounded-full p-2 focus:outline-none">
                🡪
            </button>
        </div>
    </div>

    <style>
        .services-carousel {
            display: flex;
            overflow-x: hidden;
            overflow-y: hidden;
            -webkit-overflow-scrolling: touch;
            margin-bottom: 20px;
        }

        .service-card {
            flex: 0 0 auto;
            width: calc(100% / 3 - 10px);
            margin-right: 20px;
            scroll-snap-align: start;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const fadeInElements = document.querySelectorAll('[style*="animation: fadeIn"]');
            fadeInElements.forEach(element => {
                element.style.opacity = '1';
            });

            const servicesCarousel = document.querySelector('.services-carousel');
            const serviceCards = document.querySelectorAll('.service-card');
            const cardWidth = serviceCards[0].offsetWidth + 20; // Ancho de la tarjeta más el margen

            let scrollPosition = 0;

            servicesCarousel.scrollLeft = scrollPosition;

            servicesCarousel.addEventListener('scroll', () => {
                scrollPosition = servicesCarousel.scrollLeft;
            });

            const scrollRight = () => {
                scrollPosition += cardWidth;
                servicesCarousel.scrollTo({
                    left: scrollPosition,
                    behavior: 'smooth'
                });
            };
            const scrollLeft = () => {
                scrollPosition -= cardWidth;
                servicesCarousel.scrollTo({
                    left: scrollPosition,
                    behavior: 'smooth'
                });
            };
            document.getElementById('scrollLeft').addEventListener('click', scrollLeft);
            document.getElementById('scrollRight').addEventListener('click', scrollRight);
        });
    </script>
@endsection
