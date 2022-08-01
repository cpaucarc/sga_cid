<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rango_pagos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio_estudiante');
            $table->date('fecha_fin_pago');
            $table->date('fecha_inicio_revision');
            $table->date('fecha_fin_revision');
            $table->date('fecha_inicio_validacion');
            $table->date('fecha_fin_validacion');
            $table->foreignId('mensual_id')->constrained('mensuales')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rango_pagos');
    }
};
