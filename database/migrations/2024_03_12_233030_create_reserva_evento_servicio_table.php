<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservaEventoServicioTable extends Migration
{
    public function up()
    {
        Schema::create('reserva_evento_servicio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reserva_evento_id')->constrained('reservas_eventos')->onDelete('cascade');
            $table->foreignId('servicio_evento_id')->constrained('servicio_eventos')->onDelete('cascade');
            $table->decimal('precio', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reserva_evento_servicio');
    }
}
