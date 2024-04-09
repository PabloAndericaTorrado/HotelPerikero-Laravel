<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Reserva</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #edf2f7;
            color: #1a202c;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            margin: auto;
            padding: 20px;
            max-width: 800px;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .header {
            text-align: center;
            margin-bottom: 2rem;
        }
        h1, h2 {
            color: #2d3748;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.5rem;
        }
        th, td {
            padding: 0.5rem;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        th {
            background-color: #f7fafc;
        }
        .footer {
            text-align: center;
            margin-top: 2rem;
            font-size: 0.875rem;
        }
        .footer a {
            color: #3182ce;
            text-decoration: none;
        }

        .logo {
            max-width: 80px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <img src="{{ public_path('images/logoPH.jpg') }}" alt="Logo" class="logo">
        <h1>Detalles de la Reserva</h1>
    </div>

    <h2>Información del Cliente</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <td>{{ $reserva->usuario->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $reserva->usuario->email }}</td>
        </tr>
        <tr>
            <th>Teléfono</th>
            <td>{{ $reserva->usuario->telefono }}</td>
        </tr>
    </table>

    <h2>Detalles de la Estancia</h2>
    <table>
        <tr>
            <th>Check-in</th>
            <td>{{ $reserva->check_in }}</td>
        </tr>
        <tr>
            <th>Check-out</th>
            <td>{{ $reserva->check_out }}</td>
        </tr>
        <tr>
            <th>Número de Noches</th>
            <td>{{ $reserva->numero_noches }}</td>
        </tr>
        <tr>
            <th>Tipo de Habitación</th>
            <td>{{ $reserva->habitacion->tipo }}</td>
        </tr>
        <tr>
            <th>Precio Total</th>
            <td>{{ number_format($reserva->precio_total, 2) }} €</td>
        </tr>
    </table>

    @if($reserva->servicios->count() > 0)
        <h2>Servicios Adicionales</h2>
        <table>
            @foreach($reserva->servicios as $servicio)
                <tr>
                    <th>{{ $servicio->nombre }}</th>
                    <td>{{ number_format($servicio->precio, 2) }} €</td>
                </tr>
            @endforeach
        </table>
    @endif

    @if($reserva->reservaParking)
        <h2>Detalles del Parking</h2>
        <table>
            <tr>
                <th>Plaza de Parking</th>
                <td>{{ $reserva->reservaParking->parking_id }}</td>
            </tr>
            <tr>
                <th>Matrícula del Vehículo</th>
                <td>{{ $reserva->reservaParking->matricula }}</td>
            </tr>
        </table>
    @endif

    <div class="footer">
        <p>Para cualquier consulta, no dude en contactarnos en <a href="mailto:info@hotelperikero.com">info@hotelperikero.com</a>.
        </p>
        <p>¡Esperamos que disfrute su estancia!</p>
    </div>
</div>
</body>
</html>
