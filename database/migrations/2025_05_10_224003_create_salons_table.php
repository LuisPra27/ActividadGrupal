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
        Schema::create('salon', function (Blueprint $table) {
    $table->integer('IDsalon')->primary();
    $table->string('nombre');
    $table->string('direccion');
    $table->integer('capacidad');
    $table->decimal('preciohora', 8, 2); // Equivalente a "money" en Laravel/PostgreSQL
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salons');
    }
};
