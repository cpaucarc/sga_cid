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
        Schema::create('prematriculados', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_inscripcion');
            $table->boolean('esta_matriculado')->default(false);
            $table->foreignId('curso_id')->constrained('cursos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('estudiante_id')->constrained('estudiantes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
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
        Schema::dropIfExists('prematriculados');
    }
};
