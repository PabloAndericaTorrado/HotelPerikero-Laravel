<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('factura_habitacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reserva_id')->constrained()->onDelete('cascade');
            $table->dateTime('fecha_expedicion');
            $table->string('correo_huesped');
            $table->dateTime('fecha_check_in');
            $table->dateTime('fecha_check_out');
            $table->decimal('monto', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('factura_habitacion');
    }
};
