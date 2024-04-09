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
        Schema::create('mensaje_chats', function (Blueprint $table) {
            $table->id();
            $table->string("mensaje");
            $table->string("emisor");
            $table->string("hora_mensaje");
            $table->boolean("leido");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensaje_chats');
    }
};
