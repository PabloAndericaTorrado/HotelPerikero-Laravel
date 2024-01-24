<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';

    public function mostrarFormularioReservaServicios()
    {
        $servicios = Servicio::all();

        return view('reservas.create', compact('servicios'));
    }
    public function reservas()
    {
        return $this->belongsToMany(Reserva::class, 'reserva_servicios', 'servicio_id', 'reserva_id')
            ->withPivot('cantidad') // Si es necesario, puedes incluir otros campos pivot
            ->withTimestamps(); // Para gestionar automáticamente las marcas de tiempo de la tabla pivot
    }

}
