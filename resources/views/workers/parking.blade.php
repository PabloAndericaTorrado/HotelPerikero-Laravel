@extends('workers.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Reservas de Estacionamiento</h1>
        <ul>
            @foreach ($reservasParking as $reservaParking)
                <li>{{ $reservaParking->id }}</li>
            @endforeach
        </ul>
    </div>
@endsection
