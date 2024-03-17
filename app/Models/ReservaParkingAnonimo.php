<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaParkingAnonimo extends Model
{
    use HasFactory;

    protected $fillable = ['matricula', 'fecha_hora_entrada', 'parking_id', 'salida_registrada'];

    public function parking()
    {
        return $this->belongsTo(Parking::class, 'parking_id');
    }

}
