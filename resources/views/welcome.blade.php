<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perikero Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        .container {
            max-width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        .header1 {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('welcome_images/background_index.jpg') }}') center/cover no-repeat fixed;
            background-size: 100% 100%;
        }

        .nav-link {
            transition: color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .nav-link:hover {
            color: #fca311;
        }

        /* Sección principal */
        .main-section {
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
            margin-right: 0;
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

        .room-card {
            flex: 0 0 33.3333%; /* Cambiado de 100% a 33.3333% para mostrar tres tarjetas en una fila */
            max-width: 33.3333%;
            transition: transform 0.3s ease-in-out;
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
            height: 250px;
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
</head>

<body>
    <!-- Barra de inicio -->
    <header class="header1">
        <div class="container mx-auto py-4 px-4 flex justify-between items-center">
            <div class="flex items-center">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/logoPH.jpg') }}" alt="Hotel Elegance" class="h-20 w-20 mr-2">
                </a>
                <h1 class="text-3xl font-bold text-white">Perikero Hotel</h1>
            </div>
            <nav>
                <ul class="flex space-x-4">
                    <li><a class="text-white nav-link" href="{{ url('/') }}">Inicio</a></li>
                    <li><a class="text-white nav-link" href="{{ route('habitaciones.index') }}">Habitaciones</a></li>
                    <li><a class="text-white nav-link" href="{{ route('servicios.index') }}">Servicios</a></li>
                    <li><a class="text-white nav-link" href="{{ route('reservas.index') }}">Reservas</a></li>
                    <li><a class="text-white nav-link" href="{{ route('habitaciones.contacto') }}">Contacto</a></li>

                    @guest
                        <li><a class="text-white nav-link" href="{{ route('login') }}">Iniciar Sesión</a></li>
                    @else
                        <li><a class="text-white nav-link"
                               href="{{ route('habitaciones.cuenta') }}">{{ auth()->user()->email }}</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="text-white nav-link">Cerrar Sesión</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </nav>
        </div>
        <!-- Sección principal -->
        <section class="main-section">
            <div class="container mx-auto">
                <h1 class="text-primary-dark">Bienvenido a Hotel Perikero</h1>
                <p>Una experiencia única te espera en nuestro hotel de lujo en Marbella.</p>
                <a href="#"
                   class="bg-primary text-white py-2 px-6 rounded-full hover:bg-primary-dark transition-colors duration-300">Reserva
                    ahora</a>
            </div>
        </section>
    </header>

    <!-- Sección de habitaciones -->
    <section class="rooms-section">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-8">Nuestras mejores habitaciones</h2>

            <div class="flex">
                <!-- Habitación 3 -->
                <div class="room-card">
                    <img src="{{ asset('habitacion_images/habitacion_' . $habitacion3->id . '.jpg') }}"
                         alt="{{ $habitacion3->descripcion }}">
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
                    <img src="{{ asset('habitacion_images/habitacion_' . $habitacion7->id . '.jpg') }}"
                         alt="{{ $habitacion7->descripcion }}">
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
                    <img src="{{ asset('habitacion_images/habitacion_' . $habitacion8->id . '.jpg') }}"
                         alt="{{ $habitacion8->descripcion }}">
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
                        <p>Relájate y rejuvenece en nuestro spa de primera clase. Tratamientos exclusivos y atención
                            personalizada.</p>
                    </div>
                </div>

                <!-- Servicio 2 -->
                <div class="service-card">
                    <img src="path/to/service2.jpg" alt="Servicio 2">
                    <div class="service-card-content">
                        <h2>Gastronomía Exquisita</h2>
                        <p>Descubre una variedad de opciones culinarias en nuestros restaurantes galardonados.
                            Ingredientes frescos y sabores únicos.</p>
                    </div>
                </div>

                <!-- Servicio 3 -->
                <div class="service-card">
                    <img src="path/to/service3.jpg" alt="Servicio 3">
                    <div class="service-card-content">
                        <h2>Eventos y Conferencias</h2>
                        <p>Organiza eventos inolvidables en nuestros espacios para conferencias y salones elegantes.
                            Servicio de alta calidad.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

