@extends('layouts.app')

@section('content')
    <section class="container mx-auto my-8">
        <h1 class="text-4xl font-bold text-center mb-8">Información de Contacto</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-4">Nuestra Ubicación</h2>
                <p class="text-gray-600 mb-4">Perikero Hotel</p>
                <p class="text-gray-600 mb-4">Av. Santiago Ramón y Cajal 2 </p>
                <p class="text-gray-600 mb-4">Badajoz</p>
                <p class="text-gray-600 mb-4">CP: 06001</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-4">Información de Contacto</h2>
                <p class="text-gray-600 mb-4"><strong>Teléfono:</strong> +123 456 7890</p>
                <p class="text-gray-600 mb-4"><strong>Correo Electrónico:</strong> info@perikerohotel.com</p>
            </div>
        </div>

        <div class="mt-8">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3144.711392451587!2d-122.41941828463235!3d37.77492997975336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808f7e0423a43e1d%3A0x4a501367f076adff!2sGolden%20Gate%20Bridge!5e0!3m2!1sen!2sus!4v1636035250579!5m2!1sen!2sus"
                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>
@endsection

@push('styles')
    <!-- Agrega tus estilos adicionales aquí -->
    <style>
        /* Agrega estilos específicos para la página de contacto */
    </style>
@endpush
