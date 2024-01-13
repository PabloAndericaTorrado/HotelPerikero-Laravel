@extends('layouts.app')

@section('content')
    <style>
        /* Estilos Tailwind CSS */
        .text-primary {
            color: #3490dc;
        }

        .text-primary:hover {
            color: #2779bd;
        }

        .text-primary-dark {
            color: #1d68a7;
        }

        .bg-primary {
            background-color: #3490dc;
        }

        .bg-primary-dark {
            background-color: #1d68a7;
        }

        .border-primary {
            border-color: #3490dc;
        }

        .border-primary-dark {
            border-color: #1d68a7;
        }

        body {
            background-color: #fff; /* Color de fondo predeterminado para el resto de la página */
        }

        /* Sección principal */
        .main-section {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('welcome_images/background_index.jpg') }}') center/cover no-repeat fixed;
            background-size: 100% 100%;  /* Ajuste para que la imagen cubra toda la página */
            color: #fff;
            padding: 10rem 0;
            text-align: center;
        }

        .main-section h1 {
            font-size: 4rem;
            font-weight: bold;
            margin-bottom: 2rem;
        }

        .main-section p {
            font-size: 1.5rem;
            margin-bottom: 4rem;
        }

        /* Sección de habitaciones */
        .rooms-section {
            padding: 6rem 0;
        }

        .room-card {
            background-color: #fff;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            margin-right: 1rem; /* Añadido espacio entre tarjetas */
            width: 30%; /* Establecer el ancho de las tarjetas */
        }

        .room-card:last-child {
            margin-right: 0; /* Eliminar margen derecho en la última tarjeta */
        }

        .room-card:hover {
            transform: translateY(-10px);
        }

        .room-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-bottom: 1px solid #eee;
        }

        .room-card-content {
            padding: 1.5rem;
        }

        .room-card h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .room-card p {
            font-size: 1rem;
            color: #555;
        }

        /* Estilos específicos para el carrusel de habitaciones */
        .carousel-inner {
            display: flex;
            flex-wrap: nowrap;
            overflow: hidden;
        }

        .room-card {
            flex: 0 0 33.3333%; /* Cambiado de 100% a 33.3333% para mostrar tres tarjetas en una fila */
            max-width: 33.3333%;
            transition: transform 0.3s ease-in-out;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: auto;
            color: #fff;
            font-size: 2rem;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .carousel-control-prev {
            left: 0;
        }

        .carousel-control-next {
            right: 0;
        }

        /* Sección de servicios */
        .services-section {
            background-color: #f8f8f8;
            padding: 6rem 0;
        }

        .service-card {
            background-color: #fff;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            margin-bottom: 2rem;
        }

        .service-card:hover {
            transform: translateY(-10px);
        }

        .service-card img {
            width: 100%;
            height: 250px; /* Ajusta la altura según tu preferencia */
            object-fit: cover;
            border-bottom: 1px solid #eee;
        }

        .service-card-content {
            padding: 1.5rem;
        }

        .service-card h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .service-card p {
            font-size: 1rem;
            color: #555;
        }
    </style>

    <!-- Sección principal -->
    <section class="main-section">
        <div class="container mx-auto">
            <h1 class="text-primary-dark">Bienvenido a Hotel Perikero</h1>
            <p>Una experiencia única te espera en nuestro hotel de lujo en <Marbella></Marbella>.</p>
            <a href="#" class="bg-primary text-white py-2 px-6 rounded-full hover:bg-primary-dark transition-colors duration-300">Reserva ahora</a>
        </div>
    </section>

    <!-- Sección de habitaciones -->
    <section class="rooms-section">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-8">Nuestras mejores habitaciones</h2>

            <div class="flex">
                <!-- Habitación 3 -->
                <div class="room-card">
                    <img src="{{ asset('habitacion_images/habitacion_' . $habitacion3->id . '.jpg') }}" alt="{{ $habitacion3->descripcion }}">
                    <div class="room-card-content">
                        <h2>Suite de lujo</h2>
                        <p><strong>Descripción: </strong>{{ $habitacion3->descripcion }}</p>
                        @if($habitacion3->disponibilidad === 1)
                            <p><strong>Disponibilidad:</strong> Disponible</p>
                            <button
                                class="bg-blue-500 text-white px-6 py-3 rounded-md self-start mt-4">
                                Más información
                            </button>
                        @else
                            <p><strong>Disponibilidad: </strong> No disponible</p>
                            <button
                                class="bg-red-500 text-white px-6 py-3 rounded-md cursor-not-allowed self-start mt-4">No
                                Disponible
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Habitación 7 -->
                <div class="room-card">
                    <img src="{{ asset('habitacion_images/habitacion_' . $habitacion7->id . '.jpg') }}" alt="{{ $habitacion7->descripcion }}">
                    <div class="room-card-content">
                        <h2>Suite Ejecutiva</h2>
                        <p>{{ $habitacion7->descripcion }}</p>
                        @if($habitacion3->disponibilidad === 1)
                            <p><strong>Disponibilidad:</strong> Disponible</p>
                            <button
                                class="bg-blue-500 text-white px-6 py-3 rounded-md self-start mt-4">
                                Más información
                            </button>
                        @else
                            <p><strong>Disponibilidad: </strong> No disponible</p>
                            <button
                                class="bg-red-500 text-white px-6 py-3 rounded-md cursor-not-allowed self-start mt-4">No
                                Disponible
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Habitación 8 -->
                <div class="room-card">
                    <img src="{{ asset('habitacion_images/habitacion_' . $habitacion8->id . '.jpg') }}" alt="{{ $habitacion8->descripcion }}">
                    <div class="room-card-content">
                        <h2>Habitación Familiar</h2>
                        <p>{{ $habitacion8->descripcion }}</p>
                        @if($habitacion3->disponibilidad === 1)
                            <p><strong>Disponibilidad:</strong> Disponible</p>
                            <button
                                class="bg-blue-500 text-white px-6 py-3 rounded-md self-start mt-4">
                                Más información
                            </button>
                        @else
                            <p><strong>Disponibilidad: </strong> No disponible</p>
                            <button
                                class="bg-red-500 text-white px-6 py-3 rounded-md cursor-not-allowed self-start mt-4">No
                                Disponible
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de servicios -->
    <section class="services-section">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-8">Nuestros Servicios</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Servicio 1 -->
                <div class="service-card">
                    <img src="path/to/service1.jpg" alt="Servicio 1">
                    <div class="service-card-content">
                        <h2>Spa y Bienestar</h2>
                        <p>Relájate y rejuvenece en nuestro spa de primera clase. Tratamientos exclusivos y atención personalizada.</p>
                    </div>
                </div>

                <!-- Servicio 2 -->
                <div class="service-card">
                    <img src="path/to/service2.jpg" alt="Servicio 2">
                    <div class="service-card-content">
                        <h2>Gastronomía Exquisita</h2>
                        <p>Descubre una variedad de opciones culinarias en nuestros restaurantes galardonados. Ingredientes frescos y sabores únicos.</p>
                    </div>
                </div>

                <!-- Servicio 3 -->
                <div class="service-card">
                    <img src="path/to/service3.jpg" alt="Servicio 3">
                    <div class="service-card-content">
                        <h2>Eventos y Conferencias</h2>
                        <p>Organiza eventos inolvidables en nuestros espacios para conferencias y salones elegantes. Servicio de alta calidad.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
