@extends('layouts.app')

@section('content')
    <section class="container mx-auto my-8 px-4 py-8">
        <div class="max-w-7xl mx-auto bg-gradient-to-r from-blue-50 to-blue-100 p-8 rounded-xl shadow-2xl">
            <h1 class="text-5xl font-extrabold text-center mb-12 text-blue-600">Información de Contacto</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-3xl font-semibold mb-4">Nuestra Ubicación</h2>
                    <p class="text-gray-700 mb-4">Perikero Hotel</p>
                    <p class="text-gray-700 mb-4">C. Estébanez Calderón, 10 </p>
                    <p class="text-gray-700 mb-4">Marbella</p>
                    <p class="text-gray-700 mb-4">CP: 29602</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-3xl font-semibold mb-4">Información de Contacto</h2>
                    <p class="text-gray-700 mb-4"><strong>Teléfono:</strong> +123 456 7890</p>
                    <p class="text-gray-700 mb-4"><strong>Correo Electrónico:</strong> info@perikerohotel.com</p>
                </div>
            </div>

            <div class="mt-12">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3206.94722594127!2d-4.904586551372758!3d36.507136001210434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7329000bfebbc5%3A0xa7194e97d50ebc9e!2sAvenue%20to%20Maritimo!5e0!3m2!1ses!2ses!4v1705306477255!5m2!1ses!2ses"
                    width="100%" height="400" style="border:0; border-radius: 8px; overflow: hidden;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        /* No additional styles needed as Tailwind CSS is used for styling */
    </style>
@endpush
