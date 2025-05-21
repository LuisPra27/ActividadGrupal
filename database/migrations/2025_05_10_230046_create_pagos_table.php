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
        Schema::create('pago', function (Blueprint $table) {
    $table->integer('IDpago')->primary();
    $table->date('FechaPago');
    $table->decimal('Monto', 8, 2); // Equivalente a "money"
    $table->string('MetodoPago');
    $table->string('Estado');
    $table->integer('IDEvento');

    // Clave foránea
    $table->foreign('IDEvento')->references('IDevento')->on('evento')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
