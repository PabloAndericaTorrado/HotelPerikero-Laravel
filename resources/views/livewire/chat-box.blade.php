<div>
    <button wire:click="abrirBoton" onclick="toggleChat()" type="button" class="bg-indigo-900 text-white rounded-full p-4 flex items-center justify-center fixed bottom-5 right-5 z-50 hover:bg-indigo-800 transition duration-300 ease-in-out shadow-lg transform hover:scale-110">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 14.75V19a2 2 0 01-2 2H7l-4 4 .01-4A2 2 0 015 19v-4.25m16 0a8.25 8.25 0 10-16.5 0m16.5 0H5"></path></svg>
    </button>

    <div id="chatPanel" class="{{ $abierto ? 'scale-100 opacity-100' : 'scale-95 opacity-0' }} transition-all duration-300 ease-linear-out fixed bottom-14 right-4 w-96 h-[450px] max-h-[85vh] bg-white border border-gray-200 rounded-lg shadow-2xl z-40 overflow-hidden">
        <div class="p-4 bg-gray-50 flex items-center justify-between border-b border-gray-200">
            <div class="flex items-center">
                <img src="{{ asset('avatar/avatar.png') }}" alt="Avatar" class="w-10 h-10 rounded-full">
                <span class="ml-3 font-semibold text-gray-800">Cuco's Chat</span>
            </div>
            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
        </div>

        <!-- Área de mensajes,con verificación de inicio de sesión -->
        @if(auth()->check())
            <div wire:poll.500ms="cargarUltimoMensaje" class="p-4 space-y-2 overflow-y-auto" style="height: calc(55vh - 8rem);">
                @foreach ($mensajesLista as $mensaje)
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
        @else
            <div class="p-4 text-center">
                <p class="text-gray-600">Debes <a href="/login" class="text-indigo-600 hover:text-indigo-800">iniciar sesión</a> para hablar con un agente.</p>
            </div>
        @endif

        <!-- Barra de entrada de mensajes con tamaños ajustados para input y botón -->
        @if(auth()->check())
            <div class="p-4 bg-gray-50 border-t border-gray-200 flex items-center">
                <input type="text" wire:model="mensajeInput" class="w-full border rounded-full p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Escribe un mensaje..." style="flex: 1 1 auto;">
                <button type="button" wire:click="enviarMensaje"
                        class="ml-2 bg-indigo-700 hover:bg-indigo-800 text-white font-bold py-2 px-6 rounded-full transition-colors duration-300 ease-in-out" style="flex: none;">
                    Enviar
                </button>
            </div>
        @endif
    </div>
</div>

<script>
    function toggleChat() {
        var chatPanel = document.getElementById('chatPanel');
        if (chatPanel.classList.contains('scale-95')) {
            chatPanel.classList.remove('scale-95', 'opacity-0');
            chatPanel.classList.add('scale-100', 'opacity-100');
        } else {
            chatPanel.classList.remove('scale-100', 'opacity-100');
            chatPanel.classList.add('scale-95', 'opacity-0');
        }
    }
</script>
