<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intentos_test extends Model
{
    use HasFactory;

    protected $table = 'intentos_tests'; // Replace with the actual table name

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_test',
        'id_usuario',
        'intento',
        'fecha_realizacion',
        'dificultad',
        'modalidad',
        'tiempo_inicio',
        'tiempo_fin',
    ];

    protected $casts = [
        'nota_test' => 'decimal:5,2',
        'fecha_realizacion' => 'date',
        'tiempo_inicio' => 'datetime:H:i:s',
        'tiempo_fin' => 'datetime:H:i:s',
    ];


    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function test()
    {
        return $this->belongsTo(Test::class, 'id_test');
    }

    public $timestamps = false;
}
