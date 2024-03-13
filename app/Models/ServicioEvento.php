<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioEvento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'descripcion',
    ];

    public function reservas()
    {
        return $this->belongsToMany(ReservaEvento::class, 'reserva_evento_servicio', 'servicio_evento_id', 'reserva_evento_id')
            ->withPivot(['precio']);
    }
}
