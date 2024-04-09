<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MensajeChat extends Model
{
    use HasFactory;

    protected $table = 'mensajes';
    protected $fillable = ['mensaje', 'emisor', 'hora_mensaje', 'leido'];



}
