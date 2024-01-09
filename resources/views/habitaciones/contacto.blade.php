<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Perikero Hotel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Agrega cualquier estilo adicional aquí -->
</head>
<body>

<!-- Navbar (copiado de tu código anterior) -->
<nav class="navbar navbar-expand-md navbar-dark">
    <div class="container d-flex justify-content-center">
        <a class="navbar-brand mx-auto" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Perikero Hotel">
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li><a class="nav-link" href="{{ url('/') }}">Inicio</a></li>
                <li><a class="nav-link" href="{{ route('habitaciones.index') }}">Habitaciones</a></li>
                <li><a class="nav-link" href="{{ route('servicios.index') }}">Servicios</a></li>
                <li><a class="nav-link" href="{{ route('reservas.index') }}">Reservas</a></li>
                <li><a class="nav-link" href="{{ route('habitaciones.contacto') }}">Contacto</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Contenido de la página de contacto -->
<div class="container mt-5">
    <h1>Contacto</h1>
    <p>¡Nos encantaría escucharte! Ponte en contacto con nosotros a través de los siguientes medios:</p>

    <div class="mb-3">
        <h2>Dirección</h2>
        <p>Perikero Hotel</p>
        <p>Dirección de tu hotel</p>
        <p>Ciudad, País</p>
    </div>

    <div class="mb-3">
        <h2>Teléfono</h2>
        <p>+XX XXXX XXXX</p>
    </div>

    <div class="mb-3">
        <h2>Correo Electrónico</h2>
        <p>info@perikerohotel.com</p>
    </div>

    <!-- Agrega cualquier otra información de contacto que desees mostrar -->

</div>

<script src="{{ asset('js/app.js') }}"></script>
<!-- Agrega cualquier script adicional aquí -->

</body>
</html>
