@extends('workers.app')

@section('content')
    <div class="grid grid-cols-5 gap-4">
        @foreach($plazasParking as $plaza)
            <div class="border p-2 plaza-parking" data-id="{{ $plaza->id }}">
                Plaza {{ $plaza->id }}
                @if(in_array($plaza->id, $reservas))
                    <div class="bg-red-500 opacity-75 cursor-not-allowed">Ocupada</div>
                @else
                    <div class="bg-green-500">Disponible</div>
                @endif
            </div>
        @endforeach
    </div>
@endsection
