<div class="text-black">

    <h5 style="color: white">Conversaciones</h5>
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
            <div class="w-full h-96 bg-white border border-gray-300 shadow-lg">
                <!-- Cabecera del Chat -->
                <div class="bg-gray-100 p-4 flex justify-between items-center border-b border-gray-300">
                    <span>Chat con {{ $conversacionSeleccionada->creador }}</span>
                    <button wire:click="cerrarChat" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                        X
                    </button>
                </div>

                <!-- Mensajes -->
                <div wire:poll.500ms="cargarUltimoMensaje" class="overflow-y-auto p-4" style="height: calc(100% - 58px - 58px);">
                    @foreach ($mensajes as $mensaje)
                        <div class="@if($mensaje->emisor == auth()->user()->id) text-right @else text-left @endif">
                            <div class="inline-block bg-gray-200 max-w-xs px-4 py-2 rounded-lg my-1">
                                <p>{{ $mensaje->mensaje }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Entrada de Mensaje -->
                <div class="p-4 bg-gray-100 flex items-center">
                    <input type="text" wire:model="mensajeInput" class="flex-grow p-2 border rounded focus:outline-none" placeholder="Escribe un mensaje...">
                    <button wire:click="enviarMensaje" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Enviar
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>
