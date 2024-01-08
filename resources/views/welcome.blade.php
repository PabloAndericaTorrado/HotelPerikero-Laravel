<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido al Hotel Perikero</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <header>
        <h1>Bienvenido al Hotel Perikero</h1>
        <p>Tu destino de lujo para una estancia inolvidable</p>
    </header>

    <section>
        <h2>Descubre nuestras habitaciones</h2>
        <p>Sumérgete en el confort de nuestras habitaciones, diseñadas para proporcionar una experiencia única.</p>
        <a href="{{ route('habitaciones.index') }}" class="btn btn-primary">Ver Habitaciones</a>
    </section>

    <section>
        <h2>Realiza tu Reserva</h2>
        <p>Planifica tu estancia y realiza tu reserva ahora para asegurarte de vivir momentos inolvidables.</p>
        <a href="{{ route('reservas.create') }}" class="btn btn-success">Reservar Ahora</a>
    </section>

    <section>
        <h2>Nuestros Servicios</h2>
        <p>Disfruta de una variedad de servicios personalizados para hacer tu estancia aún más especial.</p>
        <a href="{{ route('servicios.index') }}" class="btn btn-info">Ver Servicios</a>
    </section>

    <footer>
        <p>&copy; {{ date('Y') }} Hotel Perikero. Todos los derechos reservados.</p>
    </footer>
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
