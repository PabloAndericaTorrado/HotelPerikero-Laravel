@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-4xl font-bold text-center mb-8">Tarifa del Servicio</h1>

        <div class="bg-white p-8 rounded-lg shadow-md max-w-md mx-auto">
            @foreach($servicios as $i => $servicio)

                <div class="mb-6">
                    <img src="{{ asset('servicio_images/servicio_' . $i . '.png') }}" class="w-full h-64 object-cover rounded">
                    <h2 class="text-2xl font-semibold mb-2">{{ $servicio->nombre }}</h2>
                    <p class="text-gray-600">Precio: ${{ $servicio->precio }}</p>
                </div>
                <hr class="border-t my-4">
            @endforeach
        </div>
    </div>
@endsection

@push('styles')
    <!-- Agrega tus estilos de Tailwind CSS aquí -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
@endpush
