<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->string('nro_comprobante', 20);
            $table->date('fecha_pago');
            $table->decimal('monto_pagado');
            $table->decimal('monto_establecido');
            $table->tinyInteger('estudiante_tipo_id'); // -127 ~ 127
            $table->boolean('esta_revisado')->default(false);
            $table->boolean('esta_validado')->default(false);
            $table->tinyInteger('pago_lugar_id');
            $table->text('observacion')->nullable();
            $table->date('fecha_revision');
            $table->date('fecha_validacion');
            $table->foreignId('documento_id')->constrained('documentos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('matriculado_id')->constrained('matriculados')
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
        Schema::dropIfExists('pagos');
    }
};
