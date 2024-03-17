@extends('workers.app')

@section('content')
    <div class="grid grid-cols-5 gap-4">
        @foreach($plazasParking as $plaza)
            <div class="border rounded-lg overflow-hidden
                        @if(array_key_exists($plaza->id, $reservasData))
                            bg-red-500 text-white
                        @else
                            bg-green-500
                        @endif
                        ">
                <div class="p-4">
                    Plaza {{ $plaza->id }}
                </div>
                <div class="p-4">
                    @if(array_key_exists($plaza->id, $reservasData))
                        <div class="mb-2">
                            <strong>Estado:</strong> Ocupada
                        </div>
                        <div class="mb-2">
                            <strong>Matrícula del coche:</strong> {{ $reservasData[$plaza->id] ?? 'N/A' }}
                        </div>
                    @else
                        <div>
                            <strong>Estado:</strong> Disponible
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
