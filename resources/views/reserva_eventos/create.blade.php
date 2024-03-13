@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-4xl font-semibold mb-4 text-center text-blue-600">Reservar Espacio para Eventos</h1>
            <h2 class="text-2xl mb-6 text-center text-gray-700">Reservar: {{ $espacio->nombre }}</h2>

            @if ($errors->any())
                <div class="mb-4">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Errores:</strong>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('reserva_eventos.store') }}" method="post" class="space-y-6">
                @csrf
                <input type="hidden" name="espacio_id" value="{{ $espacio->id }}">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="fecha_inicio" class="block text-gray-700 font-semibold mb-2">Fecha y Hora de
                            Inicio:</label>
                        <input type="datetime-local" name="fecha_inicio" id="fecha_inicio"
                               class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label for="fecha_fin" class="block text-gray-700 font-semibold mb-2">Fecha y Hora de
                            Fin:</label>
                        <input type="datetime-local" name="fecha_fin" id="fecha_fin"
                               class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Seleccione los servicios para el
                        evento:</label>
                    @foreach ($servicios as $servicio)
                        <div class="flex items-center">
                            <input type="checkbox" name="servicios[]" value="{{ $servicio->id }}"
                                   class="mr-2 form-checkbox h-5 w-5 text-blue-600">
                            <label class="text-gray-700 font-medium">{{ $servicio->nombre }} -
                                ${{ $servicio->precio }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="text-center">
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                        Reservar Ahora
                    </button>
                </div>
            </form>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Convierte las fechas reservadas de PHP a JavaScript
            var fechasReservadas = @json($fechasReservadas).
            map(rango => ({
                from: rango.from,
                to: rango.to
            }));

            // Configura flatpickr
            flatpickr("#fecha_inicio", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                disable: fechasReservadas,
                onOpen: function (selectedDates, dateStr, instance) {
                    instance.set("minDate", new Date());
                },
            });

            flatpickr("#fecha_fin", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                disable: fechasReservadas,
                onOpen: function (selectedDates, dateStr, instance) {
                    instance.set("minDate", new Date());
                },
            });
        });
    </script>

@endsection
