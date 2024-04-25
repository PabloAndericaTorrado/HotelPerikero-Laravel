<div class="text-black">
    <h5 class="text-white">Conversaciones</h5>
    <!-- Contenedor Principal de Conversaciones y Chat -->
    <div class="flex flex-col items-center mt-5 w-full max-w-md mx-auto">
        @if (!$conversacionSeleccionada)
            <!-- Lista de Conversaciones -->
            @foreach ($conversaciones as $conversacion)
                <div class="w-full px-4 py-2 bg-gray-100 rounded-lg shadow cursor-pointer mb-2"
                     wire:click="seleccionarConversacion({{ $conversacion->id }})">
                    <div class="flex justify-between items-center">
                        <span>{{ $conversacion->creador }}</span>
                        <span>{{ $conversacion->created_at }}</span>
                    </div>
                </div>
            @endforeach
        @else
            <!-- Área del Chat -->
            <div class="w-full flex flex-col bg-white border border-gray-300 shadow-lg" style="height: 45vh; max-height: 800px;">
                <!-- Cabecera del Chat -->
                <div class="bg-gray-100 p-4 flex justify-between items-center border-b border-gray-300">
                    <span>Chat con {{ $conversacionSeleccionada->creador }}</span>
                    <button wire:click="cerrarChat" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" aria-label="Cerrar chat">
                        X
                    </button>
                </div>
                <!-- Mensajes -->
                <div wire:poll.500ms="cargarUltimoMensaje" class="p-4 space-y-2 overflow-y-auto flex-1">
                    @foreach ($mensajes as $mensaje)
                        <div class="flex {{ $mensaje->emisor == auth()->user()->id ? 'justify-end' : 'justify-start' }}">
                            <div class="{{ $mensaje->emisor == auth()->user()->id ? 'bg-blue-100' : 'bg-gray-100' }} rounded-lg px-4 py-2 shadow" style="max-width: 50%;">
                                <p class="text-sm text-gray-800 break-words">{{ $mensaje->mensaje }}</p>
                                <div class="text-xs text-gray-400 mt-2">
                                    <span>{{ $mensaje->hora_mensaje }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Entrada de Mensaje -->
                <div class="p-4 bg-gray-50 border-t border-gray-200 flex items-center">
                    <input type="text" wire:model="mensajeInput" class="w-full border rounded-full p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Escribe un mensaje..." aria-label="Escribe un mensaje">
                    <button type="button" wire:click="enviarMensaje"
                            class="ml-2 bg-indigo-700 hover:bg-indigo-800 text-white font-bold py-2 px-6 rounded-full transition-colors duration-300 ease-in-out" aria-label="Enviar mensaje">
                        Enviar
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>
