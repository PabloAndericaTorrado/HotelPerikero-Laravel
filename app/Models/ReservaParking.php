<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaParking extends Model
{
    use HasFactory;

    protected $table = 'reservas_parking';

    protected $fillable = ['reserva_habitacion_id', 'parking_id', 'fecha_inicio', 'fecha_fin', 'matricula'];


    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class, 'reserva_habitacion_id');
    }

    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'reserva_habitacion_id');
    }

    public function parking()
    {
        return $this->belongsTo(Parking::class, 'parking_id');
    }
}
