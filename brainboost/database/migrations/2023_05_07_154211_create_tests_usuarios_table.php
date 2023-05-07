<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tests_usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_test');
            $table->unsignedBigInteger('id_usuario');
            $table->decimal('nota', 5, 2)->nullable();
            $table->date('fecha_realizacion')->default(now());
            $table->longText('respuestas');
            $table->timestamps();

            $table->index('id_test');
            $table->index('id_usuario');

            $table->foreign('id_test')
                ->references('id')
                ->on('tests')
                ->onDelete('cascade');

            $table->foreign('id_usuario')
                ->references('id')
                ->on('usuarios')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tests_usuarios');
    }
};
