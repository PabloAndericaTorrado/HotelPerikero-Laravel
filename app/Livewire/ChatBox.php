<?php

namespace App\Livewire;

use App\Models\Conversacion;
use App\Models\MensajeChat;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Component;

class ChatBox extends Component
{

    private $_ADMIN_ID = 3;

    public $mensajeInput = '';
    public $abierto = false;
    public Collection $mensajesLista;
    public $conversacion;

    protected $listeners = ['nuevosMensajes' => 'obtenerMensaje'];

    public function mount(): void
    {
        if (auth()->check()) {
            $this->conversacion = Conversacion::where('creador', auth()->user()->id)
                ->orderBy('created_at', 'desc')->first();
            if (!$this->conversacion) {
                $this->conversacion = Conversacion::create([
                    'creador' => auth()->user()->id,
                    'cerrada' => false
                ]);
            }
            $this->mensajesLista = MensajeChat::where('receptor', auth()->user()->id)
                ->orWhere('emisor', auth()->user()->id)
                ->orderBy('hora_mensaje', 'asc')
                ->get();
        } else {
            $this->mensajesLista = new Collection([]);
        }
    }

    public function abrirBoton(): void
    {
        $this->abierto = !$this->abierto;
    }

    public function enviarMensaje(): void
    {
        $mensaje = $this->mensajeInput;
        if (!empty($mensaje)) {
            MensajeChat::create([
                'mensaje' => $mensaje,
                'emisor' => auth()->user()->id,
                'receptor' => auth()->user()->id == $this->_ADMIN_ID ? $this->conversacion->creador : $this->_ADMIN_ID,
                'conversacion' => $this->conversacion->id,
                'hora_mensaje' => Carbon::now(),
                'leido' => false
            ]);

            $this->mensajeInput = '';
            $this->notificarNuevosMensajes();
        }
    }

    public function cargarUltimoMensaje()
    {
        if ($this->conversacion) {
            $ultimoMensaje = MensajeChat::where('conversacion', $this->conversacion->id)
                ->latest('created_at')
                ->first();

            if ($ultimoMensaje && !$this->mensajesLista->contains('id', $ultimoMensaje->id)) {
                $this->mensajesLista->push($ultimoMensaje);
            }
        }
    }

    public function notificarNuevosMensajes(): void
    {
        $this->dispatch('nuevosMensajes');
    }

    public function render()
    {
        return view('livewire.chat-box');
    }
}
