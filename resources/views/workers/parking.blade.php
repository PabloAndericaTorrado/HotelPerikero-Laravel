@extends('workers.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="w-full md:w-1/4 bg-gray-900 rounded-lg p-4 h-screen flex flex-col justify-between">
                <ul class="list-none">
                    <li><a class="text-white nav-link font-bold text-lg"
                           href="{{ route('movimientos') }}">Movimientos</a></li>
                    <li><a class="text-white nav-link font-bold text-lg" href="{{ route('parking_day') }}">Ver
                            Parking</a></li>
                </ul>
            </div>

            <div class="w-full md:w-1/2 bg-gray-900 rounded-lg p-4">
                <div id="scheduler"></div>

            </div>

            <div class="w-full md:w-1/4 bg-gray-900 rounded-lg p-4">
                <!-- Tercer cajón con campo para cambiar las tarifas del parking -->
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.syncfusion.com/ej2/material.css">
    <script src="https://cdn.syncfusion.com/ej2/dist/ej2.min.js"></script>

    <script>
        var scheduleObj;
        document.addEventListener('DOMContentLoaded', function () {
            scheduleObj = new ej.schedule.Schedule({
                width: '100%',
                height: '650px',
                currentView: 'Month',
            });
            scheduleObj.appendTo('#scheduler');
            cargarReservas()
        });

        function cargarReservas() {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '{{ route("parking_reservas") }}', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);
                        console.log('Reservas del parking cargadas exitosamente:', data);
                        data.forEach(function (evento) {
                            scheduleObj.addEvent({
                                Subject: evento.title,
                                StartTime: new Date(evento.start),
                                EndTime: new Date(evento.end),
                                IsAllDay: true,
                                EventType: evento.color
                            });
                        });
                    } else {
                        console.error('Error al cargar las reservas del parking:', xhr.statusText);
                    }
                }
            };
            xhr.onerror = function () {
                console.error('Error de red al cargar las reservas del parking.');
            };
            xhr.send();
        }


    </script>
@endsection
