@extends('workers.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Estado del Parking para hoy</h1>

        <div class="-mx-2">
            <div class="grid grid-cols-5 gap-4">
                @foreach($estado_parking as $plaza_id => $estado)
                    <div class="rounded-lg shadow-md w-40 mx-2 @if($estado == 'reservada') bg-red-100 @else bg-green-100 @endif">
                        <div class="p-4">
                            <h5 class="text-lg font-semibold mb-2">Plaza de Parking #{{ $plaza_id }}</h5>
                            @if($estado == 'reservada')
                                <p class="text-red-500">Estado: Reservada</p>
                            @else
                                <p class="text-green-500">Estado: Disponible</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
