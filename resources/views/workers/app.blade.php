<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Trabajador de Parking - Perikero Hotel</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans bg-gray-100">
<header class="header1 bg-gradient-to-b from-gray-700 to-gray-900">
    <div class="container mx-auto py-4 px-4 flex justify-between items-center">
        <div class="flex items-center">
            <a href="{{ url('/worker/parking') }}">
                <img src="{{ asset('images/logoPH.jpg') }}" alt="Perikero Hotel" class="h-20 w-20 mr-2">
            </a>
            <h1 class="text-3xl font-bold text-white">PP Parking Periquero</h1>
        </div>
        <nav>
            <ul class="flex space-x-4">
                <li><a class="text-white nav-link" href="{{route('movimientos')}}">Movimientos</a></li>
                <li><a class="text-white nav-link" href="{{ route('parking_day') }}">Ver Parking</a></li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-white nav-link">Cerrar Sesión</button>
                </form>
            </ul>
        </nav>
    </div>
</header>
<main class="py-4">
    @yield('content')
</main>
</body>

</html>
