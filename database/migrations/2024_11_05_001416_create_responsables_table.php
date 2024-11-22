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
        Schema::create('responsables', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cedula');
            $table->string('nombre',255);
            $table->string('apellido',255);
            $table->string('direccion');
            $table->string('telefono', 20);
            $table->string('email',200)->unique();
            $table->string('estado',10)->default("Activo");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responsables');
    }
};
