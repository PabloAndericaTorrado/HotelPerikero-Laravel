<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = 'habitacions';

    // Relación con el modelo Reserva
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'habitacion_id');
    }
}
