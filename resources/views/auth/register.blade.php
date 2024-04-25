@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-100 flex items-center justify-center ">
        <div class="max-w-4xl w-full bg-gradient-to-r from-blue-50 to-blue-100 shadow-md rounded-lg p-10 sm:w-3/4 md:w-2/3 lg:w-3/4 xl:w-2/3 p-10">
            <div class="text-center">
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    {{ __('Registrarse') }}
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    {{ __('Rellena los campos del formulario de registro.') }}
                </p>
            </div>
            <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @php
                        $fields = [
                            ['name' => 'name', 'label' => __('Name'), 'icon' => 'https://cdn-icons-png.flaticon.com/512/1077/1077063.png'],
                            ['name' => 'apellidos', 'label' => __('Apellidos'), 'icon' => 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png'],
                            ['name' => 'email', 'label' => __('Email Address'), 'icon' => 'https://cdn-icons-png.flaticon.com/512/561/561127.png'],
                            ['name' => 'password', 'label' => __('Password'), 'icon' => 'https://cdn-icons-png.flaticon.com/512/3064/3064197.png'],
                            ['name' => 'password_confirmation', 'label' => __('Confirm Password'), 'icon' => ''],
                            ['name' => 'telefono', 'label' => __('Teléfono'), 'icon' => 'https://cdn-icons-png.flaticon.com/512/15/15874.png'],
                            ['name' => 'direccion', 'label' => __('Dirección'), 'icon' => 'https://cdn-icons-png.flaticon.com/512/1239/1239525.png'],
                            ['name' => 'país', 'label' => __('País'), 'icon' => 'https://cdn-icons-png.flaticon.com/512/197/197374.png'],
                            ['name' => 'ciudad', 'label' => __('Ciudad'), 'icon' => 'https://cdn-icons-png.flaticon.com/512/684/684908.png'],
                            ['name' => 'codigo_postal', 'label' => __('Código Postal'), 'icon' => 'https://cdn-icons-png.flaticon.com/512/684/684809.png']
                        ];
                    @endphp
                    @foreach ($fields as $field)
                        <div>
                            <label for="{{ $field['name'] }}" class="block text-sm font-medium text-gray-700">{{ $field['label'] }}</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                @if ($field['icon'])
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <img src="{{ $field['icon'] }}" alt="" class="h-5 w-5 text-gray-500">
                                    </div>
                                    <input id="{{ $field['name'] }}" name="{{ $field['name'] }}" type="{{ $field['name'] == 'password' || $field['name'] == 'password_confirmation' ? 'password' : 'text' }}" required class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 pt-3 pb-3 rounded-xl bg-white border focus:outline-none" value="{{ old($field['name']) }}">
                                @else
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <img src="https://cdn-icons-png.flaticon.com/512/3064/3064197.png" alt="" class="h-5 w-5 text-gray-500">
                                    </div>
                                    <input id="{{ $field['name'] }}" name="{{ $field['name'] }}" type="password" required class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 pt-3 pb-3 border-gray-300 rounded-lg bg-white border focus:outline-none">
                                @endif
                            </div>
                        </div>
                    @endforeach
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
