<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $table = 'preguntas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_test',
        'tipo_pregunta',
        'nombre_pregunta',
        'datos_pregunta',
        'retroalimentacion'
    ];

    public function test()
    {
        return $this->belongsTo(Test::class, 'id_test', 'id');
    }

}
