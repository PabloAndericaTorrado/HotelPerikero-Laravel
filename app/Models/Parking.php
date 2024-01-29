<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;

    protected $table = 'parking'; // Nombre correcto de la tabla para las plazas de estacionamiento

    protected $fillable = [
        'id',
        'disponible',
    ];

    public function reservas()
    {
        return $this->hasMany(ReservaParking::class, 'parking_id');
    }
}
