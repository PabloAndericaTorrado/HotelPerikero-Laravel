@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-md rounded-lg p-6 w-full sm:w-3/4 md:w-1/2 lg:w-1/3">
            <div class="text-2xl font-semibold mb-6">{{ __('Register') }}</div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-600">{{ __('Name') }}</label>
                    <input id="name" type="text" class="mt-1 p-2 w-full border rounded-md @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="text-red-500 text-sm mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="apellidos" class="block text-sm font-medium text-gray-600">{{ __('Apellidos') }}</label>
                    <input id="apellidos" type="text" class="mt-1 p-2 w-full border rounded-md @error('apellidos') border-red-500 @enderror" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos">
                    @error('apellidos')
                    <span class="text-red-500 text-sm mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="mt-1 p-2 w-full border rounded-md @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="text-red-500 text-sm mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">{{ __('Password') }}</label>
                    <input id="password" type="password" class="mt-1 p-2 w-full border rounded-md @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="text-red-500 text-sm mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password-confirm" class="block text-sm font-medium text-gray-600">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="mt-1 p-2 w-full border rounded-md" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="mb-4">
                    <label for="telefono" class="block text-sm font-medium text-gray-600">{{ __('Teléfono') }}</label>
                    <input id="telefono" type="text" class="mt-1 p-2 w-full border rounded-md @error('telefono') border-red-500 @enderror" name="telefono" value="{{ old('telefono') }}" autocomplete="telefono">
                    @error('telefono')
                    <span class="text-red-500 text-sm mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="direccion" class="block text-sm font-medium text-gray-600">{{ __('Dirección') }}</label>
                    <input id="direccion" type="text" class="mt-1 p-2 w-full border rounded-md @error('direccion') border-red-500 @enderror" name="direccion" value="{{ old('direccion') }}" autocomplete="direccion">
                    @error('direccion')
                    <span class="text-red-500 text-sm mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="país" class="block text-sm font-medium text-gray-600">{{ __('País') }}</label>
                    <input id="país" type="text" class="mt-1 p-2 w-full border rounded-md @error('país') border-red-500 @enderror" name="país" value="{{ old('país') }}" autocomplete="país">
                    @error('país')
                    <span class="text-red-500 text-sm mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="ciudad" class="block text-sm font-medium text-gray-600">{{ __('Ciudad') }}</label>
                    <input id="ciudad" type="text" class="mt-1 p-2 w-full border rounded-md @error('ciudad') border-red-500 @enderror" name="ciudad" value="{{ old('ciudad') }}" autocomplete="ciudad">
                    @error('ciudad')
                    <span class="text-red-500 text-sm mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="codigo_postal" class="block text-sm font-medium text-gray-600">{{ __('Código Postal') }}</label>
                    <input id="codigo_postal" type="text" class="mt-1 p-2 w-full border rounded-md @error('codigo_postal') border-red-500 @enderror" name="codigo_postal" value="{{ old('codigo_postal') }}" autocomplete="codigo_postal">
                    @error('codigo_postal')
                    <span class="text-red-500 text-sm mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex items-center justify-between mb-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
