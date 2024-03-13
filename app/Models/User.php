<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'apellidos', 'email', 'password', 'telefono', 'direccion', 'país', 'ciudad', 'codigo_postal','rol', 'email_verified_at', 'remember_token', // otros campos...
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'users_id');
    }

    public function resenias()
    {
        return $this->hasMany(Resenia::class, 'usuario_id');
    }

    public function reservaEventos()
    {
        return $this->hasMany(ReservaEvento::class, 'users_id');
    }



}
