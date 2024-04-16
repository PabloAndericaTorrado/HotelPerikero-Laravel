<div>
    <!-- Botón flotante para abrir el chat -->
    <button wire:click="abrirBoton" type="button"
            class="bg-blue-500 text-white rounded-full p-3 flex items-center justify-center fixed bottom-4 right-4 z-50 hover:bg-blue-700 transition duration-300 ease-in-out shadow-lg transform hover:scale-110">
        <img src="/avatar.jpg" alt="Avatar" class="w-8 h-8 rounded-full">
    </button>

    <!-- Panel del chat -->
    <div class="{{ $abierto ? 'scale-100 opacity-100' : 'scale-95 opacity-0' }} transition-all duration-300 ease-in-out fixed bottom-16 right-4 w-80 h-96 bg-white border border-gray-300 rounded-lg shadow-xl z-40 overflow-hidden">
        <!-- Cabecera del chat -->
        <div class="p-4 bg-gray-100 flex items-center justify-between border-b border-gray-300">
            <div class="flex items-center">
                <img src="{{ asset('avatar/avatar.png') }}" alt="Avatar" class="w-8 h-8 rounded-full">
                <span class="ml-2 font-bold">Cuco's Chat</span>
            </div>
            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
        </div>

        <!-- Área de mensajes -->
        <div wire:poll.500ms="cargarUltimoMensaje" class="p-4 overflow-y-auto" style="height: calc(100% - 3.5rem - 3.5rem);">
            @foreach ($mensajesLista as $mensaje)
                <div class="@if($mensaje->emisor == auth()->user()->id) text-right @else text-left @endif">
                    <div class="inline-block bg-gray-100 max-w-xs lg:max-w-3/4 px-4 py-2 rounded-lg my-1 shadow">
                        <p>{{ $mensaje->mensaje }}</p>
                        <div class="text-xs text-gray-500 flex justify-between items-center">
                            <span>{{ $mensaje->hora_mensaje }}</span>
                            @if($mensaje->leido)
                                <i class="fas fa-check-double text-blue-500"></i>
                            @else
                                <i class="fas fa-check text-gray-500"></i>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Barra de entrada de mensajes -->
        <div class="p-4 bg-gray-100 border-t border-gray-300 flex items-center">
            <input type="text" wire:model="mensajeInput" class="flex-grow p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Escribe un mensaje...">
            <button type="button" wire:click="enviarMensaje"
                    class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors duration-300 ease-in-out">
                Enviar
            </button>
        </div>
    </div>
</div>
