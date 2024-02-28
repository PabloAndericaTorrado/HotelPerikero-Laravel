@extends('workers.app')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        @forelse($reservasParking as $reservaParking)
            <div class="max-w-md mx-auto mb-6">
                <div class="border p-4 rounded-lg shadow-md bg-white hover:shadow-lg transition-shadow duration-300 relative">
                    <div class="absolute top-0 right-0 p-2 bg-blue-500 text-white rounded-bl-lg">
                        <p class="font-semibold">Reserva #{{ $reservaParking->id }}</p>
                        <p>Matrícula: {{ $reservaParking->matricula }}</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="col-span-1 flex justify-center items-center border-b pb-4">
                            <p><strong>Fecha Inicio:</strong> {{ $reservaParking->fecha_inicio }}</p>
                        </div>
                        <div class="col-span-1 flex justify-center items-center border-b pb-4">
                            <p><strong>Fecha Fin:</strong> {{ $reservaParking->fecha_fin }}</p>
                        </div>
                    </div>

                    <div class="text-center">
                        <form action="{{ route('reservas.delete.view', $reservaParking->id) }}" method="get" class="mt-4">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-full inline-flex items-center transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Cancelar Reserva
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info" role="alert">
                    No hay reservas de estacionamiento disponibles.
                </div>
            </div>
        @endforelse
    </div>




@endsection
