<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Reserva extends Model
{
    protected $table = 'reservas';
    protected $dates = ['check_in', 'check_out', 'created_at', 'updated_at']; // Agrega created_at y updated_at

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }

    // Relación con el modelo Habitacion
    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class, 'habitacion_id');
    }

    // Relación con el modelo ReservaServicio
    public function servicios()
    {
        return $this->hasMany(ReservaServicio::class, 'reserva_id');
    }

    public function calculateTotalPrice()
    {
        $this->check_in = Carbon::createFromFormat('Y-m-d', $this->check_in)->startOfDay();
        $this->check_out = Carbon::createFromFormat('Y-m-d', $this->check_out)->endOfDay();

        if ($this->check_in instanceof Carbon && $this->check_out instanceof Carbon) {
            $diasReserva = $this->check_in->diffInDays($this->check_out);
            $precioHabitacion = $this->habitacion->precio;

            $precioTotal = $diasReserva * $precioHabitacion;
            return $precioTotal;
        }
        return 0;
    }

    public function calculateTotalDays()
    {
        if ($this->check_in instanceof Carbon && $this->check_out instanceof Carbon) {
            $diasReserva = $this->check_in->diffInDays($this->check_out);
            return $diasReserva;
        }
        return 0;
    }




}
