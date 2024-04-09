@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-5xl font-extrabold text-center mb-12 text-blue-600">Tarifa del Servicio</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
            @foreach($servicios as $i => $servicio)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 ease-in-out hover:shadow-2xl">
                    <img src="{{ asset('servicio_images/servicio_' . ($i + 1) . '.jpg') }}" alt="{{ $servicio->nombre }}" class="w-full h-48 object-cover">

                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-4">{{ $servicio->nombre }}</h2>
                        <p class="text-gray-600 mb-4">{{ $servicio->descripcion }}</p>
                        <p class="text-lg font-semibold text-gray-800">Precio: <span class="text-green-500">${{ $servicio->precio }}</span></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@endpush
