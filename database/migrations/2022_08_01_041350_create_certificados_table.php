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
        Schema::create('certificados', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_emision');
            $table->string('num_registro', 25);
            $table->mediumInteger('horas');
            $table->foreignId('estudiante_id')->nullable()->constrained('estudiantes')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('idioma_dictable_id')->nullable()->constrained('idiomas_dictables')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificados');
    }
};
