<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perikero Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/flatpickr.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
</style>

<body class="font-sans bg-gray-100 flex flex-col min-h-screen">

<header class="bg-gradient-to-b from-gray-800 to-gray-900 text-white py-4 shadow-md w-full">
    <div class="flex justify-between items-center px-4">
        <div class="flex items-center">
            <a href="{{ url('/admin/dashboard') }}">
                <img src="{{ asset('images/logoPH.jpg') }}" alt="Logo de Perikero Hotel" class="h-16 w-16 mr-3">
            </a>
            <h1 class="text-2xl font-bold">Perikero Hotel</h1>
        </div>
        <nav>
            <ul class="flex space-x-4">
                <li><a class="nav-link hover:text-yellow-400 transition-colors" href="{{ url('/admin/dashboard') }}">Inicio</a></li>
                <li><a class="nav-link hover:text-yellow-400 transition-colors" href="{{ route('admins.today_reservations') }}">Reservas de Hoy</a></li>
                <li><a class="nav-link hover:text-yellow-400 transition-colors" href="{{ route('admins.create_reservation') }}">Crear Reserva</a></li>
                @guest
                    <li><a class="nav-link hover:text-yellow-400 transition-colors" href="{{ route('login') }}">Iniciar Sesión</a></li>
                @else
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link hover:text-yellow-400 transition-colors">Cerrar Sesión</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </nav>
    </div>
</header>

<main class="flex-grow container mx-auto py-8 px-4">
    @yield('content')
</main>

</body>

</html>
