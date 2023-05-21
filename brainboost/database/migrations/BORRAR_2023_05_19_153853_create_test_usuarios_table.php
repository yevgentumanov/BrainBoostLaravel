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
        Schema::create('your_table_name', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_test');
            $table->unsignedBigInteger('id_usuario');
            $table->decimal('nota', 5, 2)->nullable();
            $table->date('fecha_realizacion')->nullable()->default(DB::raw('CURDATE()'));
            $table->longText('respuestas');
            $table->timestamps();

            $table->index('id_test');
            $table->index('id_usuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_usuarios');
    }
};
