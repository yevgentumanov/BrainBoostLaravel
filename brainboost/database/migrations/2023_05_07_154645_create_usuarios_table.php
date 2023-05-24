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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_usuario', 50);
            $table->string('password'); // Update the password column to be a string
            $table->string('email', 255);
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
