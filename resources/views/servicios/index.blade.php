
@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-4xl font-bold text-center mb-8">Tarifa del Servicio</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            @foreach($servicios as $servicio)
                <li>
                    <h2 class="text-xl font-semibold mb-4">{{ $servicio->nombre }}</h2>
                    <p class="text-gray-600">Precio: ${{ $servicio->precio }}</p>
                </li>
            @endforeach
        </div>
    </div>
@endsection

@push('styles')
    <!-- Agrega tus estilos de Tailwind CSS aquí -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
@endpush
