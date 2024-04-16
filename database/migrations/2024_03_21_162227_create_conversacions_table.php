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
        Schema::create('conversacions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("creador")->unsigned()->nullable(false);
            $table->boolean("cerrada");
            $table->timestamps();

            $table->foreign('creador')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversacions');
    }
};
