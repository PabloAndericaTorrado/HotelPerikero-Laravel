@extends('workers.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-semibold text-center mb-8">Movimientos</h1>
        <form action="{{ route('movimientos.registrar') }}" method="POST" id="movimientos-form" class="flex justify-center">
            @csrf
            <button type="button" id="registrar-entrada" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full mr-4">
                Registrar Entrada
            </button>
            <button type="button" id="registrar-salida" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full">
                Registrar Salida
            </button>
        </form>

        <div id="formulario-salida" class="hidden mt-8">
            <form action="{{ route('movimientos.registrar') }}" method="POST">
                @csrf
                <label for="matricula" class="block mb-2">Matrícula del coche:</label>
                <input type="text" id="matricula" name="matricula" class="border rounded-md px-3 py-2 w-full">
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('registrar-salida').addEventListener('click', function () {
                // Mostrar el formulario de salida y ocultar el formulario de entrada
                document.getElementById('formulario-salida').classList.remove('hidden');
                document.getElementById('formulario-entrada').classList.add('hidden');
            });

            // Agregar evento para mostrar el formulario de entrada cuando se hace clic en "Registrar Entrada"
            document.getElementById('registrar-entrada').addEventListener('click', function () {
                // Mostrar el formulario de entrada y ocultar el formulario de salida
                document.getElementById('formulario-entrada').classList.remove('hidden');
                document.getElementById('formulario-salida').classList.add('hidden');
            });

        });
    </script>
@endsection
