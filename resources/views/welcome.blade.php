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
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #ffffff;
            color: #272a2f;
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
            background-color: #272a2f;
            color: #ffffff;
        }
    </style>
</head>

<body class="font-sans">
<header class="header1">
    <div class="container mx-auto py-4 px-4 flex justify-between items-center">
        <div class="flex items-center">
            <img src="{{ asset('images/logoPH.jpg') }}" alt="Hotel Elegance" class="h-20 w-20 mr-2">
            <h1 class="text-2xl font-bold text-white">Perikero Hotel</h1>
        </div>
        <nav>
            <ul class="flex space-x-4">
                <li><a class="text-white hover:text-gray-800" href="{{ route('habitaciones.index') }}">Habitaciones</a></li>
                <li><a class="text-white hover:text-gray-800" href="{{ route('servicios.index') }}">Servicios</a></li>
                <li><a class="text-white hover:text-gray-800" href="{{ route('reservas.index') }}">Reservas</a></li>
                <li><a class="text-white hover:text-gray-800" href="{{ route('habitaciones.contacto') }}">Contacto</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold mb-8 text-gray-800 text-center">Bienvenido al Perikero Hotel</h2>
            <p class="text-lg text-gray-700 mb-8 text-center">Descubre nuestras habitaciones lujosas y servicios exclusivos para una estadía inolvidable.</p>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-4">
            <!-- Contenido de habitaciones, servicios o reservas -->
            
        </div>
    </section>
</main>

<footer class="bg-gray-800 text-white py-4">
    <div class="container mx-auto text-center">
        <p>Derechos reservados &copy; 2024 Perikero Hotel</p>
    </div>
</footer>
</body>

</html>
