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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 13);
            $table->string('requisito', 13)->nullable();
            $table->string('ciclo', 5);
            $table->tinyInteger('aforo_maximo'); // -127 ~ 127
            $table->foreignId('idioma_dictable_id')->constrained('idiomas_dictables')
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
        Schema::dropIfExists('cursos');
    }
};
