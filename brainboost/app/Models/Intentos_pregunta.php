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
        'id_intento_test',
        'id_pregunta',
        'nota_pregunta',
        'respuestas',
    ];

    protected $casts = [
        'nota_pregunta' => 'float',
    ];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'id_pregunta');
    }

    public function intentoTest()
    {
        return $this->belongsTo(Intentos_test::class, 'id_intento_test');
    }

    public $timestamps = false;
}
