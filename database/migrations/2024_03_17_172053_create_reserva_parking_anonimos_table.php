<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_parking_anonimos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parking_id')->constrained('parking')->onDelete('cascade');
            $table->string('matricula');
            $table->dateTime('fecha_hora_entrada');
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
        Schema::dropIfExists('reserva_parking_anonimos');
    }
};
