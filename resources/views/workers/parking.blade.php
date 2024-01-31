{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Panel de parking</div>

                    <div class="card-body">
                        ¡Bienvenido al panel de parking, {{ Auth::user()->name }}!

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
