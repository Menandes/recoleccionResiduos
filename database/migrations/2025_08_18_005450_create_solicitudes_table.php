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
            $table->foreignId('residuo_id')->constrained()->onDelete('cascade');
            $table->date('fecha_recoleccion');
            $table->string('tipo_residuo', 100);
            $table->enum('estado', ['Pendiente', 'En proceso', 'Recolectado'])->default('Pendiente');
            $table->decimal('peso', 8, 2)->nullable(); 
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
