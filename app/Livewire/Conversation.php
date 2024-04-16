<?php

namespace App\Livewire;

use App\Models\MensajeChat;
use App\Models\Conversacion;
use Livewire\Component;

class Conversation extends Component
{
    public $conversaciones;
    public $conversacionSeleccionada;
    public $mensajes;
    public $mensajeInput = '';

    public function mount(){
        $this->conversaciones = Conversacion::all();
        $this->conversacionSeleccionada = $this->conversaciones->first();

        if ($this->conversacionSeleccionada) {
            $this->mensajes = MensajeChat::where('conversacion', $this->conversacionSeleccionada->id)->get();
        }
    }

    public function render()
    {
        return view('livewire.conversation');
    }

    public function seleccionarConversacion($conversacionId)
    {
        $this->conversacionSeleccionada = Conversacion::find($conversacionId);
        $this->mensajes = MensajeChat::where('conversacion', $this->conversacionSeleccionada->id)->get();
    }

    public function cerrarChat()
    {
        $this->conversacionSeleccionada = null;
        $this->mensajes = collect();
    }

    public function enviarMensaje()
    {
        if (!empty($this->mensajeInput) && $this->conversacionSeleccionada) {
            MensajeChat::create([
                'mensaje' => $this->mensajeInput,
                'emisor' => auth()->id(),
                'receptor' => $this->conversacionSeleccionada->creador,
                'conversacion' => $this->conversacionSeleccionada->id,
                'hora_mensaje' => now(),
                'leido' => false
            ]);

            $this->mensajeInput = '';

            $this->mensajes = MensajeChat::where('conversacion', $this->conversacionSeleccionada->id)->get();
        }
    }

    public function cargarUltimoMensaje()
    {
        if ($this->conversacionSeleccionada) {
            $ultimoMensaje = MensajeChat::where('conversacion', $this->conversacionSeleccionada->id)
                ->latest('created_at')
                ->first();

            if ($ultimoMensaje && !$this->mensajes->contains('id', $ultimoMensaje->id)) {
                $this->mensajes->push($ultimoMensaje);
            }
        }
    }

}
