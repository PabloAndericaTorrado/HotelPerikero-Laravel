<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido al Hotel Elegance</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Agrega estilos personalizados aquí si es necesario -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #232e3b !important;
        }

        .navbar-brand img {
            width: 80px;
            height: auto;
        }

        .navbar-nav .nav-link {
            color: #ffffff !important;
        }

        .hero-section {
            text-align: center;
            padding: 100px 0;
            background-color: #1F2C38;
            color: #ffffff;
        }

        .hero-section h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .hero-section p {
            font-size: 1.2em;
            margin-bottom: 40px;
        }

        .cta-section {
            text-align: center;
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        .cta-section h2 {
            font-size: 2.5em;
            margin-bottom: 30px;
        }

        .cta-section p {
            font-size: 1.2em;
            margin-bottom: 40px;
            color: #495057;
        }

        .cta-btn {
            display: inline-block;
            padding: 15px 30px;
            font-size: 1.2em;
            color: #ffffff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
        }

        .cta-btn:hover {
            background-color: #0056b3;
        }

        .feature-section {
            padding: 100px 0;
            background-color: #ffffff;
        }

        .feature {
            text-align: center;
            margin-bottom: 40px;
        }

        .feature img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .feature h3 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #007bff;
        }

        .feature p {
            font-size: 1.2em;
            color: #495057;
        }

        .contact-section {
            text-align: center;
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        .contact-section h2 {
            font-size: 2.5em;
            margin-bottom: 30px;
        }

        .contact-section p {
            font-size: 1.2em;
            margin-bottom: 40px;
            color: #495057;
        }

        .contact-btn {
            display: inline-block;
            padding: 15px 30px;
            font-size: 1.2em;
            color: #ffffff;
            background-color: #28a745;
            border-radius: 5px;
            text-decoration: none;
        }

        .contact-btn:hover {
            background-color: #218838;
        }

        .footer {
            text-align: center;
            padding: 50px 0;
            background-color: #343a40;
            color: #ffffff;
        }

        .footer p {
            margin: 0;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Hotel Elegance">
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('habitaciones.index') }}">Habitaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reservas.create') }}">Reservar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('servicios.index') }}">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('servicios.index') }}">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1>Bienvenido al Perikeros Hotel</h1>
        <p>Tu destino de lujo para una estancia inolvidable</p>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>Descubre la elegancia y el confort</h2>
        <p>Planifica tu estancia ahora y experimenta el lujo en cada detalle.</p>
        <a href="{{ route('reservas.create') }}" class="cta-btn">Reservar Ahora</a>
    </div>
</section>

<!-- Feature Section -->
<section class="feature-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="feature">
                    <img src="{{ asset('images/feature1.jpg') }}" alt="Confort">
                    <h3>Confort Inigualable</h3>
                    <p>Experimenta la comodidad en nuestras habitaciones diseñadas para tu relajación.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature">
                    <img src="{{ asset('images/feature2.jpg') }}" alt="Gastronomía">
                    <h3>Gastronomía Exquisita</h3>
                    <p>Disfruta de una variedad de platillos elaborados por nuestros chefs expertos.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature">
                    <img src="{{ asset('images/feature3.jpg') }}" alt="Servicio de Calidad">
                    <h3>Servicio de Calidad</h3>
                    <p>Nuestro personal está dedicado a hacer que tu estancia sea inolvidable.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <h2>Contacto</h2>
        <p>¿Tienes alguna pregunta o solicitud especial? ¡No dudes en contactarnos!</p>
        <a href="{{ route('servicios.index') }}" class="contact-btn">Contacto</a>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <p>&copy; {{ date('Y') }} Hotel Elegance. Todos los derechos reservados.</p>
    </div>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
<!-- Agrega scripts personalizados aquí si es necesario -->

</body>
</html>
