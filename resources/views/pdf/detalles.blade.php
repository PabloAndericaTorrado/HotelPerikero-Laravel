<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Reserva</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f5f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            margin: auto;
            padding: 20px;
            max-width: 800px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header, .footer {
            text-align: center;
            margin-bottom: 5px;
        }

        h1, h2 {
            color: #336699;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .logo {
            max-width: 80px;
            margin-bottom: 20px;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #74b9ff 0%, #55a0fc 100%);
            color: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .accent-color {
            color: #3498db;
        }

        .footer {
            background-color: #336699;
            color: #fff;
            padding: 20px;
            border-radius: 0 0 8px 8px;
        }

        .footer a {
            color: #fff;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header gradient-bg">
        <img src="{{ public_path('images/logoPH.jpg') }}" alt="Logo" class="logo">
        <h1 class="accent-color">Detalles de la Reserva</h1>
    </div>

    <h2 class="accent-color">Información del Cliente</h2>
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

    <h2 class="accent-color">Detalles de la Estancia</h2>
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
        <h2 class="accent-color">Servicios Adicionales</h2>
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
        <h2 class="accent-color">Detalles del Parking</h2>
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
</div>

<div class="footer">
    <p>Para cualquier consulta, no dude en contactarnos en <a href="mailto:info@hotelperikero.com">info@hotelperikero.com</a>.
    </p>
    <p>¡Esperamos que disfrute su estancia!</p>
</div>
</body>
</html>
