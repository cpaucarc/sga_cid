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
        Schema::create('idioma_dictable_requisitos', function (Blueprint $table) {
            $table->id();
            $table->boolean('esta_activo')->default(false);
            $table->foreignId('requisito_id')->constrained('requisitos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
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
        Schema::dropIfExists('idioma_dictable_requisitos');
    }
};
