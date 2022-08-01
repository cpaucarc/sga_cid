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
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('nro_solicitud'); // -8388608 ~ 8388607
            $table->tinyInteger('estado_id'); // -127 ~ 127
            $table->foreignId('estudiante_id')->constrained('estudiantes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('idioma_dictable_id')->constrained('idiomas_dictables')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('solicitud_tipo_id')->constrained('solicitud_tipos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
};
