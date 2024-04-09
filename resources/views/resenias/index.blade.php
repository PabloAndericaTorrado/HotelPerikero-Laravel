@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-4xl font-extrabold mb-6 text-center text-blue-600">Todas las Reseñas</h2>
        @if($resenias->isEmpty())
            <div class="bg-white rounded-xl shadow-xl p-8 max-w-2xl mx-auto text-center">
                <p class="text-gray-600 text-lg">No hay reseñas disponibles.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($resenias as $resenia)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 ease-in-out hover:shadow-2xl">
                        <img src="{{ asset('habitacion_images/habitacion_' . $resenia->reserva->habitacion->id . '.jpg') }}" alt="{{ $resenia->reserva->habitacion->tipo }}" class="w-full h-64 object-cover">

                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/456/456212.png" alt="Foto de perfil predeterminada" class="w-12 h-12 rounded-full mr-4">
                                <div>
                                    <div class="text-gray-800 text-xl font-semibold">{{ $resenia->usuario->name }}</div>
                                </div>
                            </div>
                            <div class="text-lg font-medium text-gray-800 mb-2">Tipo de habitación: {{ $resenia->reserva->habitacion->tipo }}</div>

                            <div class="bg-blue-100 p-4 rounded-lg">
                                <div class="flex items-center mb-2">
                                    <div class="flex items-center">
                                        <span class="text-gray-700 mr-2">{{ $resenia->reserva->habitacion->tipo }}</span>
                                        <div class="flex">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <svg class="{{ $i <= $resenia->calificacion ? 'text-yellow-500' : 'text-gray-300' }} w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.785.57-1.84-.197-1.54-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.57 8.72c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z"></path></svg>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600">{{ $resenia->comentario ?? 'Sin comentario' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

@section('extra-css')
    <style>
        /* Animación de sombra y escala al pasar el ratón */
        .transform:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
@endsection
