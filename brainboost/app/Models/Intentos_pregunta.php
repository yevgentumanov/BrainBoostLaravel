<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intentos_pregunta extends Model
{
    use HasFactory;

    protected $table = 'intentos_preguntas'; // Replace with the actual table name

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_usuario',
        'id_pregunta',
        'intento',
        'nota',
        'fecha_realizacion',
        'respuestas',
        'dificultad',
        'modalidad',
        'tiempoInicio',
        'tiempoFin',
    ];

    protected $casts = [
        'nota' => 'decimal:5,2',
    ];

    protected $dates = [
        'fecha_realizacion',
        'tiempoInicio',
        'tiempoFin',
    ];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'id_pregunta');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public $timestamps = false;
}
