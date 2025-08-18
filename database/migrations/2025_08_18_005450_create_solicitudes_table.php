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
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('residuo_id')->constrained()->onDelete('cascade');
            $table->date('fecha_programada');
            $table->enum('tipo_recoleccion', ['Programada', 'Por demanda']);
            $table->enum('estado', ['Pendiente', 'Recolectado'])->default('Pendiente');
            $table->decimal('kilos', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicituds');
    }
};
