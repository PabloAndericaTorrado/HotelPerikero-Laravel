<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perikero Hotel</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Incluye el archivo CSS de Flatpickr desde la CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/flatpickr.min.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <!-- Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/flatpickr.min.js"></script>


    <style>
        /* Añadimos estilos adicionales para centrar el contenido */
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
            <a href="{{ url('/admin/dashboard') }}">
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
                    <li><a class="text-white nav-link" href="{{ route('habitaciones.cuenta') }}">{{ auth()->user()->email }}</a></li>
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
</body>

</html>