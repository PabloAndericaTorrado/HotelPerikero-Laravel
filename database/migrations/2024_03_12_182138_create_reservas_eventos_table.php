<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservas_eventos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained();
            $table->foreignId('espacio_id')->constrained('espacios');
            $table->dateTime('check_in');
            $table->dateTime('check_out');
            $table->integer('cantidad_personas');
            $table->decimal('precio_total', 8, 2);
            $table->boolean('pagado');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas_eventos');
    }
};
