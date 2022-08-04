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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 45);
            $table->boolean('esta_activo')->default(true);
            $table->tinyInteger('docente_categoria_id'); // -127 ~ 127
            $table->tinyInteger('docente_condicion_id');
            $table->tinyInteger('docente_dedicacion_id');
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
        Schema::dropIfExists('docentes');
    }
};
