@extends('workers.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Reservas de Estacionamiento</h1>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Matrícula</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>ID Reserva</th>
                </tr>
                </thead>
                <tbody>
                @forelse($reservasParking as $reservaParking)
                    <tr>
                        <td>{{ $reservaParking->id }}</td>
                        <td>{{ $reservaParking->fecha_inicio }}</td>
                        <td>{{ $reservaParking->fecha_fin }}</td>
                        <td>{{ $reservaParking->matricula }}</td>
                        <td>{{ $reservaParking->reserva->usuario->name }}</td>
                        <td>{{ $reservaParking->reserva->usuario->email }}</td>
                        <td>{{ $reservaParking->reserva->usuario->telefono }}</td>
                        <td>{{ $reservaParking->reserva->id }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No hay reservas de estacionamiento disponibles.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
