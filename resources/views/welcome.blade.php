@extends('layouts.app')

@section('content')
    <section class="container mx-auto my-8">
        <h1 class="text-4xl font-bold text-center mb-8">Bienvenido a la Página Principal</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">Sección 1</h2>
                <p class="text-gray-600 mb-4">Contenido de la sección 1.</p>
                <a href="#" class="text-primary hover:text-primary-dark transition duration-300">Leer más</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">Sección 2</h2>
                <p class="text-gray-600 mb-4">Contenido de la sección 2.</p>
                <a href="#" class="text-primary hover:text-primary-dark transition duration-300">Leer más</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">Sección 3</h2>
                <p class="text-gray-600 mb-4">Contenido de la sección 3.</p>
                <a href="#" class="text-primary hover:text-primary-dark transition duration-300">Leer más</a>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <!-- Agrega tus estilos adicionales aquí -->
    <style>
        .text-primary {
            color: #3490dc;
        }

        .text-primary:hover {
            color: #2779bd;
        }

        .text-primary-dark {
            color: #1d68a7;
        }
    </style>
@endpush
