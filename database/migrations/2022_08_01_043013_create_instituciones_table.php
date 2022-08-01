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
        Schema::create('instituciones', function (Blueprint $table) {
            $table->id();
            $table->string('ruc', 11)->nullable();
            $table->string('nombre');
            $table->string('direccion')->nullable();
            $table->tinyInteger('institucion_ambito_id'); // -127 ~ 127
            $table->tinyInteger('institucion_tipo_id');
            $table->foreignId('pais_id')->nullable()->constrained('paises')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')
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
        Schema::dropIfExists('instituciones');
    }
};
