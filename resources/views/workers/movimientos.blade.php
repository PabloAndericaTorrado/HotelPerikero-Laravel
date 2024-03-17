@extends('workers.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-semibold text-center mb-8">Movimientos</h1>
        <form action="{{ route('movimientos.registrar') }}" method="POST" class="flex justify-center">
            @csrf
            <button type="submit" name="accion" value="entrada" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full mr-4">
                Registrar Entrada
            </button>
            <button type="submit" name="accion" value="salida" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full">
                Registrar Salida
            </button>
        </form>
    </div>
@endsection
