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
        Schema::create('idiomas_dictables', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 15);
            $table->string('requisito', 15);
            $table->decimal('precio_mensual',6,2);
            $table->tinyInteger('duracion_meses'); // -127 ~ 127
            $table->foreignId('idioma_id')->constrained('idiomas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->tinyInteger('nivel_id');
            $table->foreignId('modalidad_id')->constrained('modalidades')
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
        Schema::dropIfExists('idiomas_dictables');
    }
};
