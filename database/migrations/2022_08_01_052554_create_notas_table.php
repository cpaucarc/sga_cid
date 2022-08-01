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
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante_id')->constrained('estudiantes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('grupo_id')->constrained('grupos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->decimal('nota');
            $table->foreignId('componente_id')->constrained('componentes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
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
        Schema::dropIfExists('notas');
    }
};
