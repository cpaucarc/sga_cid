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
        Schema::create('matriculados', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_inscripcion');
            $table->foreignId('estudiante_id')->constrained('estudiantes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('grupo_id')->constrained('grupos')
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
        Schema::dropIfExists('matriculados');
    }
};
