<?php

namespace App\Livewire;

use Livewire\Component;

class ChatBox extends Component
{

    public $nombre = 'Cuco';
    public $abierto = false;

    public function abrirBoton() {
        $this->abierto = !$this->abierto;
    }

    public function cambiarNombre() {
    }

    public function render()
    {
        return view('livewire.chat-box');
    }
}
