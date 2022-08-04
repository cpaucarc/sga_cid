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
            $table->boolean('esta_activo')->default(false);

            $table->date('inicio_clases')->nullable();
            $table->date('fin_clases')->nullable();

            $table->date('inicio_prematricula')->nullable();
            $table->date('fin_prematricula')->nullable();

            $table->date('inicio_matricula')->nullable();
            $table->date('fin_matricula')->nullable();

            $table->date('inicio_pago')->nullable();
            $table->date('fin_pago')->nullable();

            $table->date('inicio_revision')->nullable();
            $table->date('fin_revision')->nullable();

            $table->date('inicio_validacion')->nullable();
            $table->date('fin_validacion')->nullable();

            $table->year('anio');
            $table->tinyInteger('mes_id');
            $table->tinyInteger('clase_modalidad_id'); // -127 ~ 127
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
