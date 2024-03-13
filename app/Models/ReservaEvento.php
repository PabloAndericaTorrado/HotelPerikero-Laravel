<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaEvento extends Model
{
    protected $table = 'reservas_eventos';

    use HasFactory;

    protected $fillable = [
        'users_id', 'espacio_id', 'check_in', 'check_out', 'precio_total', 'pagado', 'cantidad_personas',
    ];


    public function usuario()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function espacio()
    {
        return $this->belongsTo(Espacio::class, 'espacio_id');
    }

    public function servicios()
    {
        return $this->belongsToMany(ServicioEvento::class, 'reserva_evento_servicio', 'reserva_evento_id', 'servicio_evento_id')
            ->withPivot(['precio']);
    }

}
