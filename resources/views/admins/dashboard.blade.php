<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
</head>
<body>
<div>
    <h1>Panel de Administrador</h1>
    <p>¡Bienvenido al panel de administrador, {{ Auth::user()->name }}!</p>

    <div>
        <h4>Opciones:</h4>
        <ul>
            <li><a href="{{ route('admins.today_reservations') }}">Reservas de hoy</a></li>
            <li><a href="{{ route('admins.create_reservation') }}">Crear Reserva</a></li>
            <!-- Agrega más enlaces según tus necesidades -->
        </ul>
    </div>
</div>
</body>
</html>
