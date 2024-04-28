@extends('workers.app')

@section('content')
    <div class="container mx-auto px-4 flex justify-center items-center h-screen">
        <div class="w-full max-w-md">
            <h1 class="text-3xl font-semibold text-center mb-8">Movimientos</h1>
            <div class="flex justify-center mb-8">
                <div class="w-full max-w-xs mx-2">
                    <div id="registrar-entrada" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 px-6 rounded-lg transform transition duration-300 ease-in-out hover:-translate-y-1 hover:scale-105 border-4 border-blue-500">
                        <span>Registrar Entrada</span>
                    </div>
                </div>
                <div class="w-full max-w-xs mx-2">
                    <div id="registrar-salida" class="bg-red-500 hover:bg-red-600 text-white font-bold py-4 px-6 rounded-lg transform transition duration-300 ease-in-out hover:-translate-y-1 hover:scale-105 border-4 border-red-500">
                        <span>Registrar Salida</span>
                    </div>
                </div>
            </div>

            <div id="formulario-salida" class="hidden mt-8">
                <form action="{{ route('movimientos.registrar') }}" method="POST" id="form-salida">
                    @csrf
                    <label for="matricula" class="block mb-2">Selecciona la matrícula del coche:</label>
                    <ul class="border rounded-md px-3 py-2 w-full" id="matriculas-list">
                        @foreach ($matriculas as $matricula)
                            <li class="cursor-pointer hover:bg-gray-200 py-1 px-2"
                                onclick="seleccionarMatricula('{{ $matricula }}')">{{ $matricula }}</li>
                        @endforeach
                    </ul>
                    <input type="hidden" id="matricula" name="matricula" value="">
                    <button type="submit" name="accion" value="salida" class="mt-4 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full">
                        Confirmar Salida
                    </button>
                </form>
            </div>


            <div id="formulario-entrada" class="hidden mt-8">
                <form action="{{ route('movimientos.registrar') }}" method="POST">
                    @csrf
                    <label for="matricula-entrada" class="block mb-2">Matrícula del coche:</label>
                    <input type="text" id="matricula-entrada" name="matricula-entrada" class="border rounded-md px-3 py-2 w-full">
                    <button type="submit" name="accion" value="entrada" class="mt-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                        Confirmar Entrada
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>

        function seleccionarMatricula(matricula) {
            document.getElementById('matricula').value = matricula;

            var matriculasList = document.getElementById('matriculas-list').getElementsByTagName('li');
            for (var i = 0; i < matriculasList.length; i++) {
                matriculasList[i].classList.remove('bg-green-200');
            }
            event.target.classList.add('bg-green-200');
        }
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('registrar-salida').addEventListener('click', function () {
                document.getElementById('formulario-salida').classList.remove('hidden');
                document.getElementById('formulario-entrada').classList.add('hidden');
            });

            document.getElementById('registrar-entrada').addEventListener('click', function () {
                document.getElementById('formulario-entrada').classList.remove('hidden');
                document.getElementById('formulario-salida').classList.add('hidden');
            });

        });
    </script>
@endsection
