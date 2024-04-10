@extends('workers.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mt-8 mb-4">Factura</h1>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <p class="block text-gray-700 text-sm font-bold mb-2">Matrícula:</p>
                <p class="text-gray-900">{{ $reservaAnonima->matricula }}</p>
            </div>
            <div class="mb-4">
                <p class="block text-gray-700 text-sm font-bold mb-2">Fecha y hora de entrada:</p>
                <p class="text-gray-900">{{ $reservaAnonima->fecha_hora_entrada }}</p>
            </div>
            <div class="mb-4">
                <p class="block text-gray-700 text-sm font-bold mb-2">Monto a pagar:</p>
                <p class="text-gray-900">${{ $factura }}</p>
            </div>
            <form action="{{ route('factura.pagar', $reservaAnonima) }}" method="POST" class="mt-4">
                @csrf
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Marcar como pagada
                </button>
            </form>
        </div>
    </div>
@endsection
