@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white shadow-md rounded-lg p-8 max-w-md w-full">
            <div class="text-3xl font-semibold mb-6 text-center">{{ auth()->user()->email }}</div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <p class="text-center">{{ __('Has Iniciado Sesión') }}</p>

            <form method="POST" action="{{ route('logout') }}" class="mt-6">
                @csrf
                <button type="submit" class="w-full bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-700 transition duration-300 ease-in-out">Logout</button>
            </form>
        </div>
    </div>
@endsection
