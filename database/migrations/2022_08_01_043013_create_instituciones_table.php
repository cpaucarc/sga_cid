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
            $table->string('ruc', 11);
            $table->string('nombre');
            $table->string('direccion');
            $table->foreignId('pais_id')->nullable()->constrained('paises')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->smallInteger('ambito_id');
            $table->smallInteger('tipo_institucion_id');
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
