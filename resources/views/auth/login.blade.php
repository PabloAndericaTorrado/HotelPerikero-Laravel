@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-100 flex items-center justify-center">
        <div class="max-w-xl w-full bg-gradient-to-r from-blue-50 to-blue-100 shadow-md rounded-lg p-10 sm:w-3/4 md:w-2/3 lg:w-3/4 xl:w-2/3 mt-0">
            <div class="text-center">
                <h2 class="mt-4 text-4xl font-extrabold text-gray-900">
                    {{ __('Login') }}
                </h2>
                <p class="mt-2 text-lg text-gray-600">
                    {{ __('Rellena los campos del formulario de inicio de sesión.') }}
                </p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mt-8">
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-600">{{ __('Email Address') }}</label>
                        <input id="email" type="email"
                               class="mt-1 p-3 w-full border rounded-md @error('email') border-red-500 @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="text-red-500 text-sm mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-600">{{ __('Password') }}</label>
                        <input id="password" type="password"
                               class="mt-1 p-3 w-full border rounded-md @error('password') border-red-500 @enderror"
                               name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="text-red-500 text-sm mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-4 flex justify-between items-center">
                        <div class="flex items-center">
                            <input class="mr-2" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="text-sm text-gray-600" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="text-sm text-blue-500 hover:text-blue-700" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="flex justify-center">
                        <button type="submit"
                                class="inline-flex items-center justify-center bg-blue-500 text-white px-8 py-4 rounded-lg font-bold hover:bg-blue-700 transition duration-300 ease-in-out transform hover:-translate-y-1 shadow-lg">
                            {{ __('Login') }}
                        </button>
                    </div>

                    <div class="text-lg text-gray-600 text-center mt-4">
                        {{ __("Don't have an account?") }} <a class="text-blue-500 hover:text-blue-700"
                                                              href="{{ route('register') }}">{{ __('Register') }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
