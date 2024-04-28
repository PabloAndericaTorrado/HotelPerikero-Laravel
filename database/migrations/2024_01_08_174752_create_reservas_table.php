<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained();
            $table->foreignId('habitacion_id')->constrained();
            $table->date('check_in');
            $table->date('check_out');
            $table->decimal('precio_total', 8, 2);
            $table->boolean('pagado');
            $table->boolean('confirmado')->default(false);
            $table->string('dni')->nullable()->default(null);
            $table->integer('numero_personas')->default(1);
            $table->timestamps();
            $table->unique(['habitacion_id', 'check_in', 'check_out']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
