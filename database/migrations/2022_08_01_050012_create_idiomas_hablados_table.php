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
            $table->boolean('es_lengua_materna')->default(false);
            $table->tinyInteger('lectura_id'); // -127 ~ 127
            $table->tinyInteger('escritura_id');
            $table->tinyInteger('conversacion_id');
            $table->foreignId('institucion_id')->constrained('instituciones')
                ->restrictOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('persona_id')->constrained('personas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('idioma', 20);
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
