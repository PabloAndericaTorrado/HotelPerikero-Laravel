<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;

    protected $table = 'reservas_parking';

    protected $fillable = [
        'reserva_id',
        'fecha_inicio',
        'fecha_fin',
        'disponibilidad',
        'matricula',
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'reserva_id');
    }
}
