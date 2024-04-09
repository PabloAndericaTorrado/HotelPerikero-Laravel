<div>
    <button wire:click="abrirBoton" type="button" class="bg-blue-500 text-white rounded-full w-12 h-12 flex items-center justify-center fixed bottom-4 right-4 z-50 hover:bg-blue-700">
        <img src="avatar.jpg" alt="Avatar" class="w-8 h-8 rounded-full">
    </button>

    <div>
        <div class="{{ $abierto ? '' : 'hidden' }} fixed bottom-16 right-4 w-80 h-96 bg-white border border-gray-300 rounded-lg shadow-md z-40 transition duration-300">
            <div class="flex items-center justify-between p-2 border-b border-gray-300">
                <img src="avatar.jpg" alt="Avatar" class="w-8 h-8 rounded-full">
                <div class="flex-grow pl-2">
                    <span class="w-3 h-3 bg-green-500 rounded-full inline-block"></span>
                    <span class="font-bold">Cuco´s chat</span>
                </div>
            </div>
            <div class="messages p-2">
                <p>{{ $nombre }}</p>
            </div>
            <input type="text" wire:model="nombre" class="w-full p-2" wire:input="cambiarNombre(">
        </div>
    </div>
</div>
