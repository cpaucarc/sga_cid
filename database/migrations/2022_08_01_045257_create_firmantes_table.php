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
        Schema::create('firmantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('certificado_id')->constrained('certificados')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('autoridad_id')->constrained('autoridades')
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
        Schema::dropIfExists('firmantes');
    }
};
