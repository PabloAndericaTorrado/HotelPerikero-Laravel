@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-4xl font-bold text-center mb-8">Tarifa del Servicio</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
            @foreach($servicios as $i => $servicio)
                <div class="overflow-hidden rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300">
                    <img src="{{ asset('servicio_images/servicio_' . ($i + 1) . '.jpg') }}" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold mb-2">{{ $servicio->nombre }}</h2>
                        <p class="text-gray-600 text-justify" style="text-align-last: left;">{{ $servicio->descripcion }}</p>
                        <br>
                        <p class="text-black-600"><strong>Precio:</strong> ${{ $servicio->precio }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
@endpush
