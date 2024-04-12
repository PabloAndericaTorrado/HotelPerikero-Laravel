<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaParking extends Model
{
    protected $table = 'factura_parking';
    protected $fillable = ['matricula', 'fecha_hora_entrada', 'fecha_hora_salida', 'monto'];

    public function reservaParkingAnonimo()
    {
        return $this->belongsTo(ReservaParkingAnonimo::class);
    }
}
