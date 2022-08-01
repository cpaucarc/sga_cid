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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 15);
            $table->string('dni', 8);
            $table->string('apellido_paterno', 45);
            $table->string('apellido_materno', 45);
            $table->string('nombres', 45);
            $table->string('celular', 11);
            $table->string('correo', 100);
            $table->date('fecha_nacimiento');
            $table->foreignId('distrito_id')->nullable()->constrained('distritos')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->smallInteger('sexo_id');
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
        Schema::dropIfExists('personas');
    }
};
