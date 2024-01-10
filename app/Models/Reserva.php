<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }

    // Relación con el modelo Habitacion
    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class, 'habitacion_id');
    }

    // Relación con el modelo ReservaServicio
    public function servicios()
    {
        return $this->hasMany(ReservaServicio::class, 'reserva_id');
    }
}
