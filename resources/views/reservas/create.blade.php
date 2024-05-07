@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-4xl font-semibold mb-4 text-center text-blue-600">Reservar Habitación</h1>
            <h2 class="text-2xl mb-6 text-center text-gray-700">Reservar Habitación: {{ $habitacion->tipo }}</h2>

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

            <form action="{{ route('reservas.store') }}" method="post" class="space-y-6">
                @csrf
                <input type="hidden" name="habitacion_id" value="{{ $habitacion->id }}">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="check_in" class="block text-gray-700 font-semibold mb-2">Fecha de Check-in:</label>
                        <input type="text" name="check_in" id="check_in" class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500" data-input>
                    </div>
                    <div>
                        <label for="check_out" class="block text-gray-700 font-semibold mb-2">Fecha de Check-out:</label>
                        <input type="text" name="check_out" id="check_out" class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500" data-input>
                    </div>
                </div>
                <div>
                    <label for="numero_personas" class="block text-gray-700 font-semibold mb-2">Número de Personas:</label>
                    <select name="numero_personas" id="numero_personas" class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
                        @for ($i = 1; $i <= min($habitacion->capacidad, 5); $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">¿Desea reservar parking?</label>
                    <div class="flex items-center">
                        <input type="checkbox" name="reservar_parking" id="reservar_parking" class="mr-2 form-checkbox h-5 w-5 text-blue-600">
                        <label for="reservar_parking" class="text-gray-700 font-medium">Quiero parking</label>
                    </div>
                </div>
                <div id="campoMatriculaParking" class="mb-4 hidden">
                    <label for="matricula_parking" class="block text-gray-700 text-sm font-bold mb-2">Matrícula del coche:</label>
                    <input type="text" name="matricula_parking" id="matricula_parking" class="w-full border p-2 rounded">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Seleccione su plaza de parking:</label>
                        <div class="grid grid-cols-5 gap-4">
                            @foreach($plazasParking as $plaza)
                                <div class="border p-2 bg-green-200 cursor-pointer plaza-parking" data-id="{{ $plaza->id }}">
                                    Plaza {{ $plaza->id }}
                                    <!-- Se quita la lógica de disponibilidad aquí ya que será manejada por JS -->
                                    <input type="radio" name="plaza_parking_id" value="{{ $plaza->id }}" class="ml-2">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">¿Desea reservar servicios extras?</label>
                    <div class="flex items-center">
                        <input type="checkbox" name="reservar_servicios" id="reservar_servicios" class="mr-2 form-checkbox h-5 w-5 text-blue-600">
                        <label for="reservar_servicios" class="text-gray-700 font-medium">Quiero reservar servicios</label>
                    </div>
                </div>

                <div id="campoServicios" class="mb-4 hidden">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Seleccione los servicios:</label>
                    @foreach ($servicios as $servicio)
                        <div class="flex items-center">
                            <input type="checkbox" name="servicios[]" value="{{ $servicio->id }}" class="mr-2 form-checkbox h-5 w-5 text-blue-600">
                            <label class="text-gray-700 font-medium">{{ $servicio->nombre }} - ${{ $servicio->precio }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                        Reservar Ahora
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkInInput = document.getElementById('check_in');
            const checkOutInput = document.getElementById('check_out');

            // Agregar evento change a los inputs de check-in y check-out
            checkInInput.addEventListener('change', updateParkingAvailability);
            checkOutInput.addEventListener('change', updateParkingAvailability);

            function updateParkingAvailability() {
                const checkIn = checkInInput.value;
                const checkOut = checkOutInput.value;

                fetch('/get-parking-reservations', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        check_in: checkIn,
                        check_out: checkOut
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        const plazaParkingElements = document.querySelectorAll('.plaza-parking');
                        plazaParkingElements.forEach(plazaParking => {
                            const plazaId = parseInt(plazaParking.dataset.id);
                            if (data.includes(plazaId)) {
                                plazaParking.classList.remove('bg-green-200', 'hover:bg-green-300', 'shadow-lg');
                                plazaParking.classList.add('bg-red-500', 'hover:bg-red-600', 'opacity-75', 'cursor-not-allowed', 'shadow-inner');
                                plazaParking.getElementsByTagName('input')[0].disabled = true;
                            } else {
                                plazaParking.classList.remove('bg-red-500', 'hover:bg-red-600', 'opacity-75', 'cursor-not-allowed', 'shadow-inner');
                                plazaParking.classList.add('bg-green-500', 'hover:bg-green-600', 'shadow-lg', 'cursor-pointer');
                                plazaParking.getElementsByTagName('input')[0].disabled = false;
                            }
                        });
                    })
                    .catch(error => {
                        console.error('Error al obtener las plazas de parking reservadas:', error);
                    });
            }

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

            const checkInPicker = flatpickr("#check_in", {
                dateFormat: "Y-m-d",
                minDate: "today",
                altInput: true,
                altFormat: "F j, Y",
                disable: disableDates,
                onChange: function(selectedDates) {
                    const date = selectedDates[0];
                    checkOutPicker.set('minDate', new Date(date).fp_incr(1)); // Ajusta la fecha mínima de check-out al día después de check-in
                }
            });

            const checkOutPicker = flatpickr("#check_out", {
                dateFormat: "Y-m-d",
                minDate: new Date().fp_incr(1), // Establece la fecha mínima para el día siguiente
                altInput: true,
                altFormat: "F j, Y",
                disable: disableDates
            });

            const checkboxReservarParking = document.getElementById('reservar_parking');
            const campoMatriculaParking = document.getElementById('campoMatriculaParking');

            checkboxReservarParking.addEventListener('change', function () {
                campoMatriculaParking.classList.toggle('hidden', !checkboxReservarParking.checked);
            });
        });

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
@endsection
