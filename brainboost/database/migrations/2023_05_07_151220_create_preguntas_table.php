<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_test');
            $table->unsignedBigInteger('tipo_pregunta');
            $table->string('nombre_pregunta');
            $table->longText('datos_pregunta');
            $table->string('retroalimentacion')->nullable();

            $table->foreign('id_test')->references('id')->on('tests');
            $table->foreign('tipo_pregunta')->references('id')->on('tipos_preguntas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
};
