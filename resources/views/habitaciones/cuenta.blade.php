

@extends('layouts.app')

@section('content')
    <div>
        <h1>CUENTA</h1>
        <p>Bienvenido, {{ $user->name }} ({{ $user->email }})</p>
        <!-- Muestra cualquier otra información del usuario según sea necesario -->
    </div>
@endsection
