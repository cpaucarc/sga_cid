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
        Schema::create('docente_idiomas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('docente_id')->constrained('docentes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('idioma_id')->constrained('idiomas')
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
        Schema::dropIfExists('docente_idiomas');
    }
};
