@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded shadow-lg">
            <h1 class="text-4xl font-semibold mb-8">Mi Perfil</h1>

            <div class="mb-4">
                <button onclick="mostrarSeccion('perfilContainer')" class="mr-2 text-blue-500">Perfil</button>
                <button onclick="mostrarSeccion('reservasContainer')" class="text-blue-500">Reservas</button>
            </div>

            <!-- Contenedor del perfil -->
            <div id="perfilContainer">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Información del usuario -->
                    <div>
                        @php
                            $atributosPerfil = [
                                'Nombre' => 'name',
                                'Apellidos' => 'apellidos',
                                'Email' => 'email',
                                'Teléfono' => 'telefono',
                            ];
                        @endphp

                        @foreach($atributosPerfil as $label => $campo)
                            <div class="mb-4">
                                <p class="text-gray-600 mr-4"><strong>{{ $label }}:</strong></p>
                                <div class="flex items-center">
                                    <span class="mr-4" id="{{ $campo.'Usuario' }}">{{ auth()->user()->$campo }}</span>
                                </div>
                                @if ($label !== 'Nombre' && $label !== 'Apellidos')
                                    <button onclick="editarCampo('{{ $campo.'Usuario' }}', '{{ $campo }}')" class="text-blue-500">Editar</button>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <div>
                        @php
                            $atributosPerfil2 = [
                                'País' => 'país',
                                'Ciudad' => 'ciudad',
                                'Dirección' => 'direccion',
                                'Código Postal' => 'codigo_postal',
                            ];
                        @endphp

                        @foreach($atributosPerfil2 as $label => $campo)
                            <div class="mb-4">
                                <p class="text-gray-600 mr-4"><strong>{{ $label }}:</strong></p>
                                <div class="flex items-center">
                                    <span class="mr-4" id="{{ $campo.'Usuario' }}">{{ auth()->user()->$campo }}</span>
                                </div>
                                <button onclick="editarCampo('{{ $campo.'Usuario' }}', '{{ $campo }}')" class="text-blue-500">Editar</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Contenedor de reservas -->
            <div id="reservasContainer" style="display:none;">
                <div class="col-span-2">
                    <!-- Estructura de reservas -->
                    <h2 class="text-2xl font-semibold mb-4">Reservas</h2>
                    @if(count(auth()->user()->reservas) > 0)
                        <ul class="space-y-4">
                            @foreach(auth()->user()->reservas as $reserva)
                                <li class="border p-4 rounded">
                                    <div class="flex justify-between items-center">
                                        <p class="text-lg font-semibold">{{ $reserva->habitacion->tipo }} - Habitación {{ $reserva->habitacion->numero }}</p>
                                        <p class="text-gray-600">{{ $reserva->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                                        <div>
                                            <p><strong>Check-in:</strong> {{ $reserva->check_in }}</p>
                                            <p><strong>Check-out:</strong> {{ $reserva->check_out }}</p>
                                        </div>
                                        <div>
                                            <p><strong>Precio Noche:</strong> ${{ $reserva->habitacion->precio }}</p>
                                            <p><strong>Precio Total:</strong> ${{ number_format($reserva->calculateTotalPrice(), 2) }}</p>
                                            <p><strong>Noches:</strong> {{ $reserva->calculateTotalDays() }} Noches</p>
                                            <p><strong>Pagado:</strong> {{ $reserva->pagado ? 'Sí' : 'No' }}</p>
                                            <form action="{{ route('reservas.delete.view', $reserva->id) }}" method="get">
                                                @csrf
                                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 active:bg-red-700 focus:outline-none focus:border-red-800 focus:ring focus:ring-red-300 disabled:opacity-25 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 mr-2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                    Cancelar Reserva
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-600">No tienes reservas.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function mostrarSeccion(seccionId) {
            document.getElementById('perfilContainer').style.display = 'none';
            document.getElementById('reservasContainer').style.display = 'none';

            document.getElementById(seccionId).style.display = 'block';
        }

        function editarCampo(idCampo, nombreCampo) {
            Swal.fire({
                title: `Editar ${nombreCampo}`,
                input: 'text',
                inputValue: document.getElementById(idCampo).innerText,
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    let nuevoValor = result.value;

                    // Actualizar el campo
                    document.getElementById(idCampo).innerText = nuevoValor;

                    // Realizar la petición para actualizar en el servidor
                    axios.post('/actualizar-usuario', {
                        campo: nombreCampo,
                        valor: nuevoValor
                    })
                        .then(function (response) {
                            console.log(response.data);
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                }
            });
        }
    </script>
@endsection
