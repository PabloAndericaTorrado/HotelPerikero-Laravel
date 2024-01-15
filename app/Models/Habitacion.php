<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = 'habitacions';

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'habitacion_id');
    }
    // En el modelo Habitacion
    public function tieneReserva()
    {
        return $this->reservas()->exists();
    }

}
