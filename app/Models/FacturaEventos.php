<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaEventos extends Model
{
    use HasFactory;

    protected $table = 'factura_eventos';

    protected $fillable = [
        'nombre_espacio',
        'fecha_expedicion',
        'correo_cliente',
        'fecha_check_in',
        'fecha_check_out',
        'monto',
    ];
}
