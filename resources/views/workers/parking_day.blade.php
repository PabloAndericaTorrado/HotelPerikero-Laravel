@extends('workers.app')

@section('content')
    <div class="grid grid-cols-5 gap-4">
        @foreach($plazasParking as $plaza)
            <div class="border rounded-lg overflow-hidden cursor-pointer"
                 onclick="mostrarDetalles({{ $plaza->id }}, '{{ $plaza->nombre }}', '{{ $reservasData[$plaza->id]['matricula'] ?? '' }}', {{ $reservasData[$plaza->id]['salida_registrada'] ?? false }})"
                 @if(array_key_exists($plaza->id, $reservasData))
                     @if($reservasData[$plaza->id]['salida_registrada'])
                         style="background-color: #3B82F6; color: white"
                 @else
                     style="background-color: #EF4444; color: white"
                 @endif
                 @else
                     style="background-color: #34D399"
                @endif
            >
                <div class="p-4 text-center">
                    Plaza {{ $plaza->id }}
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div id="modalDetalles" class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-800 bg-opacity-75 hidden">
        <div class="bg-white p-4 rounded shadow-lg">
            <h2 id="modalPlazaNombre" class="text-lg font-bold mb-2"></h2>
            <div id="modalContenido">
                <!-- Aquí se mostrarán los detalles de la plaza -->
            </div>
            <button id="cerrarModal" class="mt-2 bg-red-500 text-white px-4 py-2 rounded">Cerrar</button>
        </div>
    </div>

    <script>
        function mostrarDetalles(plazaId, plazaNombre, matriculaCoche, salidaRegistrada) {
            const modalPlazaNombre = document.getElementById('modalPlazaNombre');
            const modalContenido = document.getElementById('modalContenido');

            modalPlazaNombre.textContent = 'Plaza ' + plazaNombre;

            if (matriculaCoche) {
                let estado = salidaRegistrada ? 'Fuera del parking' : 'Estacionado';
                modalContenido.innerHTML = `
                    <div><strong>Estado:</strong> Ocupada</div>
                    <div><strong>Matrícula del coche:</strong> ${matriculaCoche}</div>
                    <div><strong>Estado del coche:</strong> ${estado}</div>
                `;
            } else {
                modalContenido.innerHTML = '<div><strong>Estado:</strong> Disponible</div>';
            }

            document.getElementById('modalDetalles').classList.remove('hidden');
        }

        document.getElementById('cerrarModal').addEventListener('click', function () {
            document.getElementById('modalDetalles').classList.add('hidden');
        });
    </script>
@endsection
