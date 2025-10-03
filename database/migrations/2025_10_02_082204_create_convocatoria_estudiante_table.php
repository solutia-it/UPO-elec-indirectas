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
        Schema::create('convocatoria_estudiante', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('convocatoria_id')->constrained('convocatorias')->onDelete('cascade');
            $table->string('dni_estudiante');
            $table->boolean('puede_votar')->default(false);
            $table->boolean('puede_presentarse')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convocatoria_estudiante');
    }
};
