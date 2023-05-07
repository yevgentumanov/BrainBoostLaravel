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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_materia');
            $table->string('nombre_test', 50);
            $table->string('descripcion', 250);
            $table->unsignedInteger('numero_visitas')->default(0);
            $table->unsignedBigInteger('id_usuario_creador');
            $table->timestamps();

            $table->foreign('id_materia')->references('id')->on('materias');
            $table->foreign('id_usuario_creador')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tests');
    }
};
