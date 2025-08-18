<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recolectores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('empresa_recolectora_id')->constrained()->onDelete('cascade');
            $table->string('numero_documento');
            $table->string('telefono');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recolectores');
    }
};