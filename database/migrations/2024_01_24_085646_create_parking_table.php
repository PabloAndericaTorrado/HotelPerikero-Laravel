<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reservas_parking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reserva_habitacion_id')->constrained('reservas')->onDelete('cascade');
            $table->foreignId('parking_id')->constrained('parking')->onDelete('cascade');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->string('matricula');
            $table->boolean('salida_registrada')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas_parking');
    }
};
