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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cedula',false);
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('direccion', 255);
            $table->string('telefono', 15);
            $table->string('email', 255)->unique();
            $table->string('estado', 10)->default('Activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
