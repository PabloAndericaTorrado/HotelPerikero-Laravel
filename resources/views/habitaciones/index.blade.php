@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Descubre nuestras Habitaciones</h1>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($habitaciones as $habitacion)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('habitacion_images/habitacion_' . $loop->iteration . '.jpg') }}" class="card-img-top" alt="Imagen de la habitación {{ $loop->iteration }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $habitacion->tipo }}</h5>
                            <p class="card-text">{{ $habitacion->descripcion }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Precio:</strong> ${{ $habitacion->precio }}</li>
                            <!-- Agrega más detalles aquí -->
                        </ul>
                        <div class="card-body">
                            <a href="{{ route('habitaciones.show', $habitacion->id) }}" class="btn btn-primary">Ver Detalles</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
