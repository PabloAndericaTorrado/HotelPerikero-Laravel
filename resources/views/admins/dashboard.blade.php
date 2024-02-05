@extends('admins.app')

@section('content')
    <!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: image("/public/welcome_images/background_index.jpg");
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
        }

        .admin-panel {
            max-width: 600px;
            margin: auto;
            padding: 30px;
            background: linear-gradient(to bottom, #272a2f, #282b30);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            text-align: center;
            transform: scale(1);
            transition: transform 0.3s;
        }

        .admin-panel:hover {
            transform: scale(1.02);
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .welcome-message {
            font-size: 1.2em;
            margin-bottom: 30px;
        }

        .options-list {
            list-style: none;
            padding: 0;
        }

        .options-list li {
            margin-bottom: 15px;
        }

        .options-list a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
            font-size: 1.2em;
            transition: color 0.3s;
        }

        .options-list a:hover {
            color: #8e44ad;
        }

        .options-list i {
            font-size: 2em;
            margin-right: 15px;
        }
    </style>
</head>

<body>
<div class="admin-panel">
    <h1>Panel de Administrador</h1>
    <p class="welcome-message">¡Bienvenido al panel de administrador, {{ Auth::user()->name }}!</p>

    <div>
        <h4>Opciones:</h4>
        <ul class="options-list">
            <li>
                <a href="{{ route('admins.today_reservations') }}">
                    <i class="fas fa-calendar-day"></i>
                    Reservas de hoy
                </a>
            </li>
            <li>
                <a href="{{ route('admins.create_reservation') }}">
                    <i class="fas fa-plus-circle"></i>
                    Crear Reserva
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Bootstrap 5 JS y Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection
