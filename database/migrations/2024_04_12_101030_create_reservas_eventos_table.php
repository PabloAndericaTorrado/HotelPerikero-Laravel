<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_espacio');
            $table->dateTime('fecha_expedicion');
            $table->string('correo_cliente');
            $table->dateTime('fecha_check_in');
            $table->dateTime('fecha_check_out');
            $table->decimal('monto', 8, 2);
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
        Schema::dropIfExists('factura_eventos');
    }
};
