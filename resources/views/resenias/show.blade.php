@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Reseñas de la Reserva Numero: {{ $reserva->id }}</h2>
        @if($reserva->resenia->isNotEmpty())
            <div>
                <h3>Reseñas</h3>
                @foreach($reserva->resenia as $resenia)
                    <div>
                        <strong>Calificación:</strong> {{ $resenia->calificacion }}<br>
                        <strong>Comentario:</strong> {{ $resenia->comentario ?: 'N/A' }}<br>
                        <strong>Por:</strong> {{ $resenia->usuario->name }}<br>
                        <hr>
                    </div>
                @endforeach
            </div>
        @else
            <p>No hay reseñas para esta reserva.</p>
        @endif
    </div>
@endsection
