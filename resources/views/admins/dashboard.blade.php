{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Panel de Administrador</div>

                    <div class="card-body">
                        ¡Bienvenido al panel de administración, {{ Auth::user()->name }}!

                        {{-- Aquí puedes agregar contenido específico para el dashboard del administrador --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
