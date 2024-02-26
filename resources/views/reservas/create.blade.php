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

                <div id="campoMatriculaParking" class="mb-4 hidden">
                    <label for="matricula_parking" class="block text-gray-700 text-sm font-bold mb-2">Matrícula del coche:</label>
                    <input type="text" name="matricula_parking" id="matricula_parking" class="w-full border p-2 rounded">
                    @if($plazasParking->count() > 0)
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Seleccione su plaza de parking:</label>
                            <div class="grid grid-cols-5 gap-4">
                                @foreach($plazasParking as $plaza)
                                    <div class="border p-2 {{ $plaza->disponible ? 'bg-green-200' : 'bg-red-200' }} cursor-pointer plaza-parking" data-id="{{ $plaza->id }}">
                                        Plaza {{ $plaza->id }}
                                        @if($plaza->disponible)
                                            <input type="radio" name="plaza_parking_id" value="{{ $plaza->id }}" class="ml-2">
                                        @else
                                            <span class="text-sm">(No disponible)</span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
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
                            const plazaId = plazaParking.dataset.id;
                            if (data.includes(plazaId)) {
                                plazaParking.classList.add('reservado');
                            } else {
                                plazaParking.classList.remove('reservado');
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

            const checkboxReservarParking = document.getElementById('reservar_parking');
            const campoMatriculaParking = document.getElementById('campoMatriculaParking');

            checkboxReservarParking.addEventListener('change', function () {
                campoMatriculaParking.classList.toggle('hidden', !checkboxReservarParking.checked);
            });
        });

    </script>
@endsection
