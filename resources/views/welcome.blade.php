<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perikero Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @livewireStyles
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
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

        .main-section a {
            transition: color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .main-section a:hover {
            color: #fca311;
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

        .button-container {
            margin-top: 1.5rem; /* Ajusta este valor según tus necesidades */
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

        #typed-text::after {
            content: '_';
            display: inline-block;
            animation: blink-caret 0.55s infinite;
        }

        @keyframes blink-caret {
            50% {
                opacity: 0;
            }
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
                <li><a class="text-white nav-link" href="{{ route('espacios.index') }}">Eventos</a></li>
                <li><a class="text-white nav-link" href="{{ route('servicios.index') }}">Servicios</a></li>
                <li><a class="text-white nav-link" href="{{ route('habitaciones.contacto') }}">Contacto</a></li>
                <li><a class="text-white nav-link" href="{{ route('resenias.index') }}">Reseñas</a></li>

                <div x-data="{ isOpen: false }" @click.away="isOpen = false" class="relative">
                    @guest
                        <li><a class="text-white nav-link" href="{{ route('login') }}">Iniciar Sesión</a></li>
                    @else
                        <li>
                            <a @click="isOpen = !isOpen" class="text-white nav-link cursor-pointer">
                                {{ auth()->user()->email }}
                            </a>
                            <div x-show="isOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg"
                                 style="display: none;">
                                <a href="{{ route('habitaciones.cuenta') }}"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mi Cuenta</a>

                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left">
                                        Cerrar Sesión
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endguest
                </div>
            </ul>
        </nav>
    </div>
    <!-- Sección principal -->
    <section class="main-section">
        <div class="container mx-auto">
            <h1 class="text-primary-dark">Bienvenido a Hotel Perikero</h1>
            <p id="typed-text"></p>
            <a href="{{ route('habitaciones.index') }}"
               class="bg-primary text-white py-2 px-6 rounded-full hover:bg-primary-dark transition-colors duration-300">Reserva
                ahora</a>
        </div>
    </section>
</header>

<!-- Sección de habitaciones -->
<section class="rooms-section">
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-8">Nuestras habitaciones mejor valoradas</h2>

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
                        <div class="button-container mt-4">
                            <a href="{{ route('habitaciones.show', $habitacion3->id) }}"
                               class="bg-blue-500 text-white px-6 py-3 rounded-md">
                                Más información
                            </a>
                        </div>
                    @else
                        <p><strong>Disponibilidad: </strong> No disponible</p>
                        <div class="button-container mt-4">
                            <button class="bg-red-500 text-white px-6 py-3 rounded-md cursor-not-allowed" disabled>
                                No Disponible
                            </button>
                        </div>
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
                    @if($habitacion7->disponibilidad === 1)
                        <p><strong>Disponibilidad:</strong> Disponible</p>
                        <div class="button-container mt-4">
                            <a href="{{ route('habitaciones.show', $habitacion7->id) }}"
                               class="bg-blue-500 text-white px-6 py-3 rounded-md">
                                Más información
                            </a>
                        </div>
                    @else
                        <p><strong>Disponibilidad: </strong> No disponible</p>
                        <div class="button-container mt-4">
                            <button class="bg-red-500 text-white px-6 py-3 rounded-md cursor-not-allowed" disabled>
                                No Disponible
                            </button>
                        </div>
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
                    @if($habitacion8->disponibilidad === 1)
                        <p><strong>Disponibilidad:</strong> Disponible</p>
                        <div class="button-container mt-4">
                            <a href="{{ route('habitaciones.show', $habitacion8->id) }}"
                               class="bg-blue-500 text-white px-6 py-3 rounded-md">
                                Más información
                            </a>
                        </div>
                    @else
                        <p><strong>Disponibilidad: </strong> No disponible</p>
                        <div class="button-container mt-4">
                            <button class="bg-red-500 text-white px-6 py-3 rounded-md cursor-not-allowed" disabled>
                                No Disponible
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección de servicios -->
<section class="services-section">
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-8">Nuestros servicios mejor valorados</h2>

        <div class="flex">
            <!-- Servicio 9 -->
            <div class="room-card service-card">
                <img src="{{ asset('servicio_index_images/servicio_index_images9.jpg') }}" alt="Servicio 9">
                <div class="room-card-content service-card-content">
                    <h2>{{$servicio9->nombre}}</h2>
                    <div class="button-container mt-4">
                        <button class="bg-blue-500 text-white px-6 py-3 rounded-md">
                            Más información
                        </button>
                    </div>
                </div>
            </div>

            <!-- Servicio 2 -->
            <div class="room-card service-card">
                <img src="{{ asset('servicio_index_images/servicio_index_images2.jpg') }}" alt="Servicio 2">
                <div class="room-card-content service-card-content">
                    <h2>{{$servicio2->nombre}}</h2>
                    <div class="button-container mt-4">
                        <button class="bg-blue-500 text-white px-6 py-3 rounded-md">
                            Más información
                        </button>
                    </div>
                </div>
            </div>

            <!-- Servicio 6 -->
            <div class="room-card service-card">
                <img src="{{ asset('servicio_index_images/servicio_index_images6.jpg') }}" alt="Servicio 6">
                <div class="room-card-content service-card-content">
                    <h2>{{$servicio5->nombre}}</h2>
                    <div class="button-container mt-4">
                        <button class="bg-blue-500 text-white px-6 py-3 rounded-md">
                            Más información
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<livewire:chat-box />

<!-- Footer -->
<footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
        <div>
            <h3 class="text-2xl font-bold mb-4">Contacto</h3>
            <div class="flex items-center mb-2">
                <img src="https://cdn-icons-png.flaticon.com/512/684/684908.png" alt="Icono de ubicación" class="h-6 w-6 mr-2">
                <p>Dirección: C. Estébanez Calderón, 10, Marbella</p>
            </div>
            <div class="flex items-center mb-2">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKq0k3DAYW5Dy2HHMLUM6g29RavUH9U3vW2_uIiDTfGQ&s" alt="Icono de teléfono de WhatsApp en rojo" class="h-6 w-6 mr-2"> <!-- Icono de teléfono de WhatsApp en color rojo -->
                <p>Teléfono: +123 456 7890</p>
            </div>


            <div class="flex items-center">
                <img src="https://cdn-icons-png.flaticon.com/512/732/732200.png" alt="Icono de email" class="h-6 w-6 mr-2">
                <p>Email: info@perikerohotel.com</p>
            </div>
        </div>
        <div class="text-center md:col-span-2">
            <p class="text-lg font-semibold">Síguenos en nuestras redes sociales</p>
            <div class="flex justify-center space-x-4 mt-4">
                <a href="https://www.facebook.com/?locale=es_ES" class="text-blue-600 hover:text-blue-800">
                    <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.675 0h-21.35C.588 0 0 .588 0 1.325v21.35C0 23.412.588 24 1.325 24h11.49V14.708h-3.16V11h3.16V8.338c0-3.127 1.91-4.828 4.695-4.828 1.337 0 2.487.1 2.822.145v3.275l-1.937.001c-1.518 0-1.813.722-1.813 1.782V11h3.625l-.472 3.708h-3.153V24h6.184c.737 0 1.325-.588 1.325-1.325v-21.35C24 .588 23.412 0 22.675 0z"></path>
                    </svg>
                </a>
                <a href="https://twitter.com/X" class="text-blue-400 hover:text-blue-600">
                    <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23.954 4.569c-.885.389-1.83.653-2.825.774 1.017-.609 1.798-1.574 2.165-2.723-.95.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-2.719 0-4.924 2.205-4.924 4.917 0 .39.044.765.127 1.124C7.728 8.087 4.1 6.128 1.67 3.149c-.427.734-.666 1.584-.666 2.491 0 1.717.873 3.233 2.202 4.122-.81-.026-1.569-.248-2.235-.616v.061c0 2.396 1.703 4.393 3.95 4.848-.416.111-.853.171-1.305.171-.318 0-.627-.029-.927-.085.626 1.956 2.444 3.38 4.6 3.42-1.68 1.319-3.808 2.105-6.115 2.105-.398 0-.79-.023-1.17-.067 2.179 1.396 4.768 2.209 7.557 2.209 9.057 0 14.009-7.504 14.009-14.009 0-.213 0-.426-.015-.636.964-.695 1.8-1.562 2.46-2.548l-.047-.02z"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var text = "Una experiencia única te espera en nuestro hotel de lujo en Marbella";
        var typedTextElement = document.getElementById('typed-text');
        var typingSpeed = 30;

        typeWriter(typedTextElement, text, 0, typingSpeed);
    });

    function typeWriter(element, text, index, speed) {
        if (index <= text.length) {
            element.innerHTML = text.substring(0, index);
            index++;
            setTimeout(function () {
                typeWriter(element, text, index, speed);
            }, speed);
        }
    }
</script>

@livewireScripts
