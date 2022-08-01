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
        Schema::create('mensuales', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio_clases');
            $table->date('fecha_fin_clases');
            $table->boolean('esta_activo')->default(false);
            $table->year('anio');
            $table->tinyInteger('clase_modalidad_id'); // -127 ~ 127
            $table->tinyInteger('mes_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensuales');
    }
};
