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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mensual_id')->nullable()->constrained('mensuales')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('curso_id')->constrained('cursos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('docente_id')->nullable()->constrained('docentes')
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
        Schema::dropIfExists('grupos');
    }
};
