@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded shadow-lg">
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
                                    <button onclick="editarCampo('{{ $campo.'Usuario' }}', '{{ $campo }}')"
                                            class="text-blue-500">Editar
                                    </button>
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
                                <button onclick="editarCampo('{{ $campo.'Usuario' }}', '{{ $campo }}')"
                                        class="text-blue-500">Editar
                                </button>
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
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            @foreach(auth()->user()->reservas as $reserva)
                                <div class="border p-4 rounded-lg shadow-md max-w-xl mx-auto mb-6 bg-white">
                                    <div class="relative mb-4">
                                        @php
                                            $imagenPath = 'habitacion_images/habitacion_' . $reserva->habitacion->id . '.jpg';
                                        @endphp
                                        @if(file_exists(public_path($imagenPath)))
                                            <img src="{{ asset($imagenPath) }}" alt="Imagen de la habitación"
                                                 class="w-full h-auto rounded-lg mb-4">
                                        @else
                                            <p class="text-gray-600 text-center p-4">No hay imagen disponible para esta
                                                habitación.</p>
                                        @endif
                                        <div class="absolute top-0 right-0 p-2 bg-blue-500 text-white rounded-bl-lg">
                                            <p class="font-semibold">{{ $reserva->habitacion->tipo }}</p>
                                            <p>Habitación {{ $reserva->habitacion->numero }}</p>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                        <div class="flex justify-center items-center border-b pb-4">
                                            <p><strong>Entrada:</strong> {{ $reserva->check_in }}</p>
                                        </div>
                                        <div class="flex justify-center items-center border-b pb-4">
                                            <p><strong>Salida:</strong> {{ $reserva->check_out }}</p>
                                        </div>
                                    </div>


                                    <div class="bg-gray-100 p-4 rounded w-full gap-4 mb-4">
                                        <p><strong>Alojamiento:</strong></p>
                                        <p><strong>Gastos de gestión:</strong> $0.00</p>
                                        <p><strong>Precio por noche</strong> {{  $reserva->habitacion->precio  }}</p>
                                        <p><strong>Estancia total:</strong> {{ $reserva -> calculateTotalDays() }} </p>
                                        <p><strong>Pagado:</strong> {{ $reserva->pagado ? 'Sí' : 'No' }}</p>

                                        <div class="my-3">
                                            <hr class="border-t-2 border-gray-300">
                                        </div>

                                        <p class="text-center"><strong>Total:</strong> ${{ number_format((float)$reserva->calculateTotalPrice(), 2) }}</p>
                                    </div>



                                    <div class="text-center">
                                        <form action="{{ route('reservas.delete.view', $reserva->id) }}" method="get"
                                              class="mt-4">
                                            @csrf
                                            <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-full inline-flex items-center transition-all duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor" class="h-4 w-4 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                                Cancelar Reserva
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>

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
    <style>
        .linea-bottom {
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 8px;
            margin-bottom: 8px;
        }
    </style>
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
