<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->boolean('esta_activo')->default(true);
            $table->foreignId('persona_id')->constrained('personas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->smallInteger('condicion_id');
            $table->smallInteger('dedicacion_id');
            $table->smallInteger('categoria_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docentes');
    }
};
