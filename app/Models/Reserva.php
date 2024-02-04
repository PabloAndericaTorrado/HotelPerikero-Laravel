<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Reserva extends Model
{
    protected $table = 'reservas';
    protected $dates = ['check_in', 'check_out', 'created_at', 'updated_at']; // Agrega created_at y updated_at

    use HasFactory;

    protected $fillable = [
        'users_id',
        'habitacion_id',
        'check_in',
        'check_out',
        'precio_total',
        'pagado',
        'confirmado'
    ];


    public function usuario()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class, 'habitacion_id');
    }

    // Relación con el modelo ReservaServicio
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'reserva_servicios', 'reserva_id', 'servicio_id')
            ->withPivot('cantidad')
            ->withTimestamps();
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

    public function calculateTotalPriceWithServices()
    {
        $precioTotal = $this->calculateTotalPrice();
        $precioServicios = $this->servicios->sum(function ($servicio) {
            return $servicio->precio;
        });
        $precioTotal += $precioServicios;

        return $precioTotal;
    }

    public function calculateTotalDays()
    {
        if ($this->check_in instanceof Carbon && $this->check_out instanceof Carbon) {
            $diasReserva = $this->check_in->diffInDays($this->check_out);
            return $diasReserva;
        }
        return 0;
    }
    public function reserva_parking()
    {
        return $this->hasOne(ReservaParking::class, 'reserva_habitacion_id');
    }







}
