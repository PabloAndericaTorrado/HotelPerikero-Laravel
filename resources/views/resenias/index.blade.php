@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8">
        <h2 class="text-3xl font-semibold mb-6 text-center">Todas las Reseñas</h2>
        @if($resenias->isEmpty())
            <div class="bg-white rounded shadow p-6 max-w-2xl mx-auto text-center">
                <p>No hay reseñas disponibles.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($resenias as $resenia)
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="p-4">
                            <div class="text-xl font-medium mb-2">Reserva ID: {{ $resenia->reserva->id }}</div>
                            <div class="text-gray-700 mb-2">Usuario: {{ $resenia->usuario->name }}</div>
                            <div class="flex items-center mb-4">
                                <div>Calificación:</div>
                                <div class="ml-2 flex">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span
                                            class="{{ $i <= $resenia->calificacion ? 'text-yellow-400' : 'text-gray-300' }}">&#9733;</span>
                                    @endfor
                                </div>
                            </div>
                            <p class="text-gray-600">Comentario: {{ $resenia->comentario ?? 'Sin comentario' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

@section('extra-css')
    <style>
        .star-rating .star {
            visibility: hidden;
        }

        .star-rating .star:before {
            content: "\2605";
            position: absolute;
            visibility: visible;
        }

        .star-rating .star.full:before {
            content: "\2605";
            color: #ffd700;
        }
    </style>
@endsection
