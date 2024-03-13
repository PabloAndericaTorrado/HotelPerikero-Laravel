@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Reservas de Eventos</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Reserva ID</th>
                <th>Usuario</th>
                <th>Espacio</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
                <th>Servicios Extras</th>
                <th>Precio Total</th>
                <th>Pagado</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->id }}</td>
                    <td>{{ $reserva->usuario->name }}</td>
                    <td>{{ $reserva->espacio->nombre }}</td>
                    <td>{{ $reserva->check_in }}</td>
                    <td>{{ $reserva->check_out }}</td>
                    <td>
                        @foreach($reserva->servicios as $servicio)
                            {{ $servicio->nombre }} ({{ $servicio->pivot->precio }})<br>
                        @endforeach
                    </td>
                    <td>{{ $reserva->precio_total }}</td>
                    <td>{{ $reserva->pagado ? 'Sí' : 'No' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
