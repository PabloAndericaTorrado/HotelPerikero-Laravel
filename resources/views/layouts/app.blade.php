<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perikero Hotel</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Incluye el archivo CSS de Flatpickr desde la CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/flatpickr.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css"/>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <!-- Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/flatpickr.min.js"></script>


    <style>
        /* Añadimos estilos adicionales para centrar el contenido */

        * {
            font-family: 'Poppins', sans-serif;
        }

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
            background: linear-gradient(to bottom, #272a2f, #282b30);
        }

        .section1 {
            background: linear-gradient(to bottom, #282b30, #d1d1d1);
        }

        .nav-link {
            transition: color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .nav-link:hover {
            color: #fca311;
        }
    </style>

</head>

<body class="font-sans">
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
</header>
<main class="py-4">
    @yield('content')
</main>
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
@stack('scripts')

@livewireScripts
</body>

</html>

