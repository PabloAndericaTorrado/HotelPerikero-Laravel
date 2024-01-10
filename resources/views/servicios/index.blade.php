@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-4xl font-bold text-center mb-8">Tarifa del Servicio</h1>

        <div class="bg-white p-8 rounded-lg shadow-md max-w-5xl mx-auto">
            <div class="flex flex-wrap justify-center -mx-4">
                @foreach($servicios as $i => $servicio)
                    <div class="w-full md:w-1/2 lg:w-1/5 px-4 mb-6">
                        <div class="flex items-center">
                            <img src="{{ asset('servicio_images/servicio_' . ($i + 1) . '.png') }}" class="w-full h-30 object-cover rounded">
                        </div>
                        <div class="mt-4">
                            <h2 class="text-lg font-semibold mb-2 text-center">{{ $servicio->nombre }}</h2>
                            <p class="text-gray-600 text-center">Precio: ${{ $servicio->precio }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <!-- Agrega tus estilos de Tailwind CSS aquí -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
@endpush
