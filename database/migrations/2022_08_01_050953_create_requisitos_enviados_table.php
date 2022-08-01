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
        Schema::create('requisitos_enviados', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion')->nullable();
            $table->tinyInteger('estado_id'); // -127 ~ 127
            $table->foreignId('requisito_curso_id')->constrained('idioma_dictable_requisitos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('solicitud_id')->constrained('solicitudes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('documento_id')->constrained('documentos')
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
        Schema::dropIfExists('requisitos_enviados');
    }
};
