<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitacionesTable extends Migration
{
    public function up()
    {
        Schema::create('habitacions', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_habitacion');
            $table->string('tipo');
            $table->decimal('precio', 8, 2);
            $table->text('descripcion')->nullable();
            $table->integer('capacidad')->default(2);
            $table->string('caracteristicas')->nullable();
            $table->boolean('disponibilidad')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('habitaciones');
    }
}
