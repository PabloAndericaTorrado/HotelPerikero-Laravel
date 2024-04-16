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
            $table->bigInteger("emisor")->unsigned()->nullable(false);
            $table->bigInteger("receptor")->unsigned()->nullable(false);
            $table->bigInteger("conversacion")->unsigned()->nullable(false);
            $table->string("mensaje");
            $table->string("hora_mensaje");
            $table->boolean("leido");
            $table->timestamps();

            $table->foreign('emisor')->references('id')->on('users');
            $table->foreign('receptor')->references('id')->on('users');
            $table->foreign('conversacion')->references('id')->on('conversacions');
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
