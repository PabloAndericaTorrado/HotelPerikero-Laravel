@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
            <h1 class="text-3xl font-semibold mb-6">Reservar Habitación</h1>
            <h2>Reservar Habitación: {{ $habitacion->tipo }}</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('reservas.store') }}" method="post">
                @csrf
                <input type="hidden" name="habitacion_id" value="{{ $habitacion->id }}">

                <div class="mb-4">
                    <label for="check_in" class="block text-gray-700 text-sm font-bold mb-2">Fecha de Check-in:</label>
                    <input type="text" name="check_in" id="check_in" class="w-full border p-2 rounded" data-input>
                </div>

                <div class="mb-4">
                    <label for="check_out" class="block text-gray-700 text-sm font-bold mb-2">Fecha de Check-out:</label>
                    <input type="text" name="check_out" id="check_out" class="w-full border p-2 rounded" data-input>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">¿Desea reservar parking?</label>
                    <div class="flex items-center">
                        <input type="checkbox" name="reservar_parking" id="reservar_parking" class="mr-2">
                        <label for="reservar_parking">Quiero parking</label>
                    </div>
                </div>

                <div id="campoMatricula" class="mb-4 hidden">
                    <label for="matricula" class="block text-gray-700 text-sm font-bold mb-2">Matrícula del coche:</label>
                    <input type="text" name="matricula" id="matricula" class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">¿Desea reservar servicios extras?</label>
                    <div class="flex items-center">
                        <input type="checkbox" name="reservar_servicios" id="reservar_servicios" class="mr-2">
                        <label for="reservar_servicios">Quiero reservar servicios</label>
                    </div>
                </div>

                <div id="campoServicios" class="mb-4 hidden">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Seleccione los servicios:</label>
                    @foreach ($servicios as $servicio)
                        <div class="flex items-center">
                            <input type="checkbox" name="servicios[]" value="{{ $servicio->id }}" class="mr-2">
                            <label>{{ $servicio->nombre }} - ${{ $servicio->precio }}</label>
                        </div>
                    @endforeach
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $('#reservar_servicios').change(function () {
                            if (this.checked) {
                                $('#campoServicios').show();
                            } else {
                                $('#campoServicios').hide();
                            }
                        });
                    });
                </script>



                <div class="mt-6">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-700">
                        Reservar Ahora
                    </button>
                </div>

            </form>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Convertir $fechasReservadas a una colección si no lo es
            const fechasReservadasCollection = @json($fechasReservadas);

            // Crear un array de fechas deshabilitadas en formato correcto para flatpickr
            const disableDates = fechasReservadasCollection.flatMap(function ($fechas) {
                // Crear un rango de fechas entre "from" y "to"
                const fechaInicio = new Date($fechas.from);
                const fechaFin = new Date($fechas.to);
                const fechasRango = [];
                while (fechaInicio <= fechaFin) {
                    fechasRango.push(fechaInicio.toISOString().split('T')[0]);
                    fechaInicio.setDate(fechaInicio.getDate() + 1);
                }
                return fechasRango;
            });

            flatpickr("#check_in", {
                dateFormat: "Y-m-d",
                minDate: "today",
                altInput: true,
                altFormat: "F j, Y",
                disable: disableDates,
            });

            flatpickr("#check_out", {
                dateFormat: "Y-m-d",
                minDate: "today",
                altInput: true,
                altFormat: "F j, Y",
                disable: disableDates,
            });
        });

        const checkboxReservarParking = document.getElementById('reservar_parking');
        const campoMatricula = document.getElementById('campoMatricula');

        checkboxReservarParking.addEventListener('change', function () {
            campoMatricula.classList.toggle('hidden', !checkboxReservarParking.checked);
        });
    </script>
@endsection
