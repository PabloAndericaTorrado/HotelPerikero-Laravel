@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="bg-white rounded shadow p-6 max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold mb-4 text-center">Añadir Reseña para la Reserva
                Número: {{ $reserva->id }}</h2>

            <div class="mb-6 border-b border-gray-200 pb-4">
                <h3 class="text-lg font-semibold">Detalles de la Reserva:</h3>
                @php
                    $imagenPath = 'habitacion_images/habitacion_' . $reserva->habitacion->id . '.jpg';
                @endphp
                @if(file_exists(public_path($imagenPath)))
                    <img src="{{ asset($imagenPath) }}" alt="Imagen de la habitación"
                         class="w-full h-auto rounded-lg mb-4">
                @else
                    <p class="text-gray-600 text-center p-4">No hay imagen disponible para esta habitación.</p>
                @endif
                <p><strong>Reserva ID:</strong> {{ $reserva->id }}</p>
                <p><strong>Cliente:</strong> {{ $reserva->usuario->name }}</p>
                <p><strong>Habitación:</strong> {{ $reserva->habitacion->tipo }}
                    ({{ $reserva->habitacion->numero_habitacion }})</p>
                <p><strong>Fecha de Entrada:</strong> {{ $reserva->check_in }}</p>
                <p><strong>Fecha de Salida:</strong> {{ $reserva->check_out }}</p>
                <p><strong>Precio Total:</strong> {{ number_format($reserva->precio_total, 2) }}€</p>
            </div>
            <form method="POST" action="{{ route('resenias.store', $reserva->id) }}" class="space-y-6">
                @csrf
                <div>
                    <label for="calificacion" class="block text-gray-700 text-sm font-bold mb-2">Calificación:</label>
                    <div class="flex space-x-1">
                        @for ($i = 1; $i <= 5; $i++)
                            <label class="star-label">
                                <input type="radio" name="calificacion" value="{{ $i }}" class="hidden star-rating"/>
                                <span class="text-3xl star">&#9733;</span>
                            </label>
                        @endfor
                    </div>
                </div>

                <div>
                    <label for="comentario" class="block text-gray-700 text-sm font-bold mb-2">Comentario
                        (Opcional):</label>
                    <textarea name="comentario" id="comentario" rows="4"
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Enviar Reseña
                    </button>
                </div>
            </form>
        </div>
    </div>

    @section('extra-js')
        <script>
            document.querySelectorAll('.star-rating').forEach(radio => {
                radio.addEventListener('change', function () {
                    document.querySelectorAll('.star').forEach((star, index) => {
                        if (index < this.value) {
                            star.classList.add('text-yellow-500');
                            star.classList.remove('text-gray-400');
                        } else {
                            star.classList.remove('text-yellow-500');
                            star.classList.add('text-gray-400');
                        }
                    });
                });
            });
        </script>
    @endsection
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('.star-rating').forEach(radio => {
                    radio.addEventListener('change', function () {
                        document.querySelectorAll('.star').forEach((star, index) => {
                            if (index < this.value) {
                                star.classList.add('text-yellow-500');
                                star.classList.remove('text-gray-400');
                            } else {
                                star.classList.remove('text-yellow-500');
                                star.classList.add('text-gray-400');
                            }
                        });
                    });
                });
            });
        </script>
    @endpush
@endsection
