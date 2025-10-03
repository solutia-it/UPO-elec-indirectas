<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('elecciones', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('convocatoria_id')
                  ->constrained('convocatorias')
                  ->onDelete('cascade');
            $table->integer('centro_id')->nullable();
            $table->string('departamento_id', 10)->nullable();
            $table->unsignedInteger('plazas');
            $table->tinyInteger('finalizada')->default('0');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('elections');
    }
};