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
        Schema::create('criterios', function (Blueprint $table) {
            $table->id();
            $table->string('varible', 5);
            $table->text('descripcion');
            $table->tinyInteger('peso');
            $table->date('fecha');
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
        Schema::dropIfExists('criterios');
    }
};
