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
        Schema::create('idiomas_hablados', function (Blueprint $table) {
            $table->id();
            $table->string('idioma', 20);
            $table->boolean('es_lengua_materna')->default(false);
            $table->tinyInteger('nivel_conversacion_id'); // -127 ~ 127
            $table->tinyInteger('nivel_escritura_id');
            $table->tinyInteger('nivel_lectura_id');
            $table->foreignId('institucion_id')->constrained('instituciones')
                ->restrictOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('persona_id')->constrained('personas')
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
        Schema::dropIfExists('idiomas_hablados');
    }
};
