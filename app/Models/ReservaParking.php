<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaParking extends Model
{
    use HasFactory;

    protected $table = 'reservas_parking';

    protected $fillable = [
        'id',
        'reserva_habitacion_id', // Cambiar a tu nombre exacto de columna si es diferente
        'reserva_parking_id', // Cambiar a tu nombre exacto de columna si es diferente
        'fecha_inicio',
        'fecha_fin',
        'matricula',
    ];

    public function reservaHabitacion()
    {
        return $this->belongsTo(Reserva::class, 'reserva_habitacion_id');
    }

    public function reservaParking()
    {
        return $this->belongsTo(Parking::class, 'reserva_parking_id');
    }
}
