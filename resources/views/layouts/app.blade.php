<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perikero Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
    </style>
</head>

<body class="font-sans">
<header class="header1">
    <div class="container mx-auto py-4 px-4 flex justify-between items-center">
        <div class="flex items-center">
            <img src="{{ asset('images/logoPH.jpg') }}" alt="Hotel Elegance" class="h-20 w-20 mr-2">
            <h1 class="text-2xl font-bold text-gray-800">Perikero Hotel</h1>
        </div>
        <nav>
            <ul class="flex space-x-4">
                <li><a class="text-white hover:text-gray-800" href="{{ url('/') }}">Inicio</a></li>
                <li><a class="text-white hover:text-gray-800" href="{{ route('habitaciones.index') }}">Habitaciones</a></li>
                <li><a class="text-white hover:text-gray-800" href="{{ route('servicios.index') }}">Servicios</a></li>
                <li><a class="text-white hover:text-gray-800" href="{{ route('reservas.index') }}">Reservas</a></li>
                <li><a class="text-white hover:text-gray-800" href="{{ route('habitaciones.contacto') }}">Contacto</a></li>
            </ul>
        </nav>
    </div>
</header>
<main class="py-4">
    @yield('content')
</main>
