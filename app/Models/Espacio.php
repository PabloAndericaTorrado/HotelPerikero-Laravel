<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espacio extends Model
{
    protected $table = 'espacios';

    use HasFactory;

    protected $fillable = [
        'nombre',
        'capacidad_maxima',
        'descripcion',
        'precio',
        'disponible',
    ];

    public function reservasEventos()
    {
        return $this->hasMany(ReservaEvento::class, 'espacio_id');
    }
}
