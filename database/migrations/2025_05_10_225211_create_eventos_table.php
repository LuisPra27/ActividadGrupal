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
        Schema::create('evento', function (Blueprint $table) {
    $table->integer('IDevento')->primary();

    $table->string('tipo'); // Asumo que "Type" se refiere a texto
    $table->string('nombre');
    $table->date('fecha');
    $table->time('hora_inicio');
    $table->time('hora_final');

    $table->integer('TotalInvitados');
    $table->integer('Confirmados');
    $table->integer('Rechazados');

    $table->integer('IDsalon');
    $table->integer('IDusuario');

    // Claves foráneas
    $table->foreign('IDsalon')->references('IDsalon')->on('salon')->onDelete('cascade');
    $table->foreign('IDusuario')->references('IDusuario')->on('usuarios')->onDelete('cascade');

});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
