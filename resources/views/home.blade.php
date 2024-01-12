@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-md rounded-lg p-6 w-full sm:w-3/4 md:w-1/2 lg:w-1/3">
            <div class="text-2xl font-semibold mb-6">{{ __('Dashboard') }}</div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <p>{{ __('You are logged in!') }}</p>
        </div>
    </div>
@endsection

