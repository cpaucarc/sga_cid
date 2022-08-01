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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->smallInteger('minutos'); // 32768 ~ 32767
            $table->tinyInteger('dia_id'); // -127 ~ 127
            $table->foreignId('aula_id')->nullable()->constrained('aulas')
                ->cascadeOnUpdate()
                ->nullOnDelete();
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
        Schema::dropIfExists('horarios');
    }
};
