<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaHabitacion extends Model
{
    protected $table = 'factura_habitacion';
    protected $fillable = [
        'reserva_id',
        'fecha_expedicion',
        'correo_huesped',
        'fecha_check_in',
        'fecha_check_out',
        'monto'
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
}
