<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VIntentosTest extends Model
{
    protected $table = 'v_intentos_tests'; // Replace with the actual view name

    protected $primaryKey = 'id';

    protected $casts = [
        'id' => 'integer',
        'id_test' => 'integer',
        'id_usuario' => 'integer',
        'intento' => 'integer',
        'fecha_realizacion' => 'date',
        'dificultad' => 'integer',
        'modalidad' => 'integer',
        'tiempo_inicio' => 'time',
        'tiempo_fin' => 'time',
        'nota_test' => 'float',
    ];

    public function intentoPreguntas()
    {
        return $this->hasMany(Intentos_pregunta::class, 'id_intento_test', 'id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function test()
    {
        return $this->belongsTo(Test::class, 'id_test');
    }

    public function getTable()
    {
        return $this->table;
    }

    public static function getFullData()
    {
        return static::groupBy('id', 'id_test', 'id_usuario', 'intento', 'fecha_realizacion', 'dificultad', 'modalidad', 'tiempo_inicio', 'tiempo_fin', 'nota_test')->get();
    }
}
