<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservas_parking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reserva_id')->constrained('reservas')->onDelete('cascade');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->enum('disponibilidad', ['ocupada', 'no_disponible'])->default('ocupada');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservas_parking');
    }
};
