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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('país')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->enum('rol', ['admin', 'user','parking'])->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
