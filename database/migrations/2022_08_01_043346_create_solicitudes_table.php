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
            $table->bigInteger('nro_solicitud');
            $table->smallInteger('estado_id');
            $table->foreignId('estudiante_id')->constrained('estudiantes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('idioma_dictable_id')->constrained('idiomas_dictables')
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
